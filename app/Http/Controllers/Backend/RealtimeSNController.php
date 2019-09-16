<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupSN;
use App\Model\Backend\Group;
use App\Model\Backend\Member;
use App\Model\Backend\electionVote;
use App\Model\Backend\electionPoint;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\election;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;
use Illuminate\Support\Facades\Auth;

class RealtimeSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = \Request::all();

        // $listgroup=GroupSN::get();

        $listgroup = Member::join('member_details','members.id','=','member_details.memberId')
        ->join('senior_groups','members.seniorGroupId','=','senior_groups.id')
        ->where('members.groupId','=',1)
        ->where('member_details.statusId',3)
        ->where('members.confirmedStatus','=',1)
        ->where('members.confirmed_at', '!=', null)
        ->where('member_details.fixStatus','=',1)
        ->where(function ($query) {
            $query->where('members.deleted_at',NULL)
            ->where('member_details.deleted_at',NULL);
        })
        ->select('members.seniorGroupId','senior_groups.groupName')
        ->groupBy('members.seniorGroupId')
        ->orderBy('members.seniorGroupId')
        ->get();

        // dd($listgroup2);

        return view('/backend/RT/snRT',compact('listgroup'));
    }

    public function snRTAll($group_id)
    {
        // if (Auth::guard('admin')->user()->can('approve_professional')) {
            $input = \Request::all();

            // dd($input);
            // if(!empty($input['hQty'])){

            //จำนวนทั้งหมดในตาราง electionpoint
            // $listcount = electionVote::all();
            // $countall=count($listcount);


            //จำนวนคนที่มีสิทธิ์ลงคะแนน
            $listcount = Member::join('member_details','members.id','=','member_details.memberId')
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$group_id)
            ->where('member_details.statusId',3)
            ->where('members.verify_status_confirm',1)
            ->where('members.confirmedStatus','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('members.id','members.firstname','members.lastname')
            ->get();
            $canelection=count($listcount);

            //จำนวนคนที่มาลงคะแนน
            $listcount = electionVote::whereHas('memberVoteTo',function($q) use($group_id){
                $q->where('groupId',1)
                ->where('seniorGroupId',$group_id);
            })
            ->where('voteTo',"!=",0)
            ->select('memberId','electionId','id')
            ->groupBy('memberId')
            ->get();

            // dd($listcount);
            $vote=count($listcount);



            //จำนวนคนที่ไม่ประสงค์ลงคะแนน
            $listcount = electionVote::whereHas('memberVoteTo',function($q)use($group_id){
                $q->where('groupid',1)
                ->where('seniorGroupId',$group_id);
            })
            ->where('voteTo',"=",0)
            ->select('memberId')
            ->groupBy('memberId')
            ->get();
            $notvote=count($listcount);

            //selectหาข้อมูล electionPoint
            $listpoint=electionPoint::orderBy('draw_status','desc')->orderBy('memberPoint','desc')
            ->whereHas('member',function($q)use($group_id){
                $q->where('groupid',1)
                ->where('seniorGroupId',$group_id);
            })
            ->get();
            if(count($listpoint)>0){
                foreach($listpoint as  $key=>$val){
                    $b[$key]=$val->memberId;
                }

                $listpoint2 = Member::join('member_details','members.id','=','member_details.memberId')
                ->where('members.groupId','=',1)
                ->where('members.seniorGroupId','=',$group_id)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->whereNotIn('members.id',$b)
                ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                ->orderBy('members.candidateNumber')
                ->get();
            }else{
                $listpoint2 = Member::join('member_details','members.id','=','member_details.memberId')
                ->where('members.groupId','=',1)
                ->where('members.seniorGroupId','=',$group_id)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                ->orderBy('members.candidateNumber')
                ->get();
            }

            // dd($listpoint[0]->member);

            //หาชื่อกลุ่ม
            $group=GroupSN::where('id','=',$group_id)->first();

            //หาวันที่ เวลา การลงคะแนน
            // $listelection=election::where('groupid',1)
            // ->where('seniorGroupId',$group_id)
            // ->first();

            //หาข้อมูลผู้ชนะในกลุ่มนั้น
            // $listwin=electionPoint::orderBy('memberPoint','desc')
            // ->whereHas('member',function($q)use($group_id){
            //     $q->where('groupid',1)
            //     ->where('seniorGroupId',$group_id);
            // })
            // ->where('draw_status',1)
            // ->get();

            //รวมคะแนน
            $listvote = electionVote::selectRaw('*,sum(point) as sumPoints')
            ->whereHas('memberVoteTo',function($q)use($group_id){
                $q->where('groupid',1)
                ->where('seniorGroupId',$group_id);
            })
            ->groupBy('voteTo')
            ->orderBy('sumPoints','desc')
            ->get();

            if(count($listvote)>0){
                foreach($listvote as  $key=>$val){
                    $a[$key]=$val->voteTo;
                }

                $listvote2 = Member::join('member_details','members.id','=','member_details.memberId')
                ->where('members.groupId','=',1)
                ->where('members.seniorGroupId','=',$group_id)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->whereNotIn('members.id',$a)
                ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                ->orderBy('members.candidateNumber')
                ->get();
            }else{
                $listvote2 = Member::join('member_details','members.id','=','member_details.memberId')
                ->where('members.groupId','=',1)
                ->where('members.seniorGroupId','=',$group_id)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                ->orderBy('members.candidateNumber')
                ->get();
            }

            // dd($list1);

            return view('backend.RT.snRTAll',compact('vote','notvote','group','group_id','listvote','listvote2','listpoint','listpoint2','canelection'));
        // } else {
        //     return redirect('/backend/home');
        // }
    }


    public function confirmvote()
    {
        // if (Auth::guard('admin')->user()->can('approve_professional')) {

            $input = \Request::all();
            $group_id=$input['Hidgroup'][0];
            $idmember=$input['Hidmember'][0];

            //หาชื่อกลุ่ม
            $group=GroupSN::where('id','=',$group_id)->first();

            //selectหาข้อมูลว่ามีการรวมคะแนนไว้ใน electionpoint หรือยัง ถ้ายังก็ให้รวมข้อมูลจากตาราง electionvote ไปใส่ในตาราง electionpoint
            $listpoint=electionPoint::whereHas('member',function($q)use($group_id){
                $q->where('groupid',1)
                ->where('seniorGroupId',$group_id);
            })
            ->get();

            if($listpoint->isEmpty()){

                //ข้อมูล sum point จากตาราง electionvote select ขึ้นมาเพื่อนำไปใส่ในตาราง electionpoint
                $list = electionVote::selectRaw('*,sum(point) as sumPoints')
                ->whereHas('memberVoteTo',function($q)use($group_id){
                    $q->where('groupid',1)
                    ->where('seniorGroupId',$group_id);
                })
                ->groupBy('voteTo')
                ->orderBy('sumPoints','desc')
                ->get();

                //นำข้อมูล $list มาวนinsert ใส่ในตาราง electionpoint
                foreach($list as $val){
                    $data['electionId']     = $val->electionId;
                    $data['memberId']       = $val->memberVoteTo->id;
                    $data['memberPoint']    = $val->sumPoints;
                    $data['round']          = 1;
                    electionPoint::create($data);
                }

                $list = electionPoint::where('memberId','=',$idmember);
                $list->where('round',1);
                $list->update(['draw_status'=>1]);

                //selectหาข้อมูล คะแนนมากที่สุด
                // $list1=electionPoint::orderBy('memberPoint','desc')
                // ->whereHas('member',function($q)use($group_id){
                //     $q->where('groupid',1)
                //     ->where('seniorGroupId',$group_id);
                // })
                // // ->where('draw_status','!=',1)
                // ->first();


                // if(!empty($list1)){
                //     //selectหาข้อมูล คะแนนมากที่สุดมีกี่คน
                //     $list2=electionPoint::orderBy('memberPoint','desc')
                //     ->whereHas('member',function($q)use($group_id){
                //         $q->where('groupid',1)
                //         ->where('seniorGroupId',$group_id);
                //     })
                //     ->where('memberPoint','=',$list1->memberPoint)
                //     // ->whereNull('draw_status')
                //     ->get();

                //     $No1point=count($list2);

                // }else{
                //     $No1point=0;
                // }

                //ถ้าคนที่ได้มากที่สุดมี 1 คน ให้ draw_status=1
                // if($No1point==1){
                //     $id=$list2->first()->id;

                //     $list = electionPoint::find($id);
                //     $list->draw_status = 1;
                //     $list->update();
                // }
            }
            // else{
            //     $No1point=0;
            // }

            //selectหาข้อมูล เพื่อจะนำไปใส่ในตารางหน้า blade
            // $listpoint=electionPoint::orderBy('memberPoint','desc')
            // ->whereHas('member',function($q)use($group_id){
            //     $q->where('groupid',1)
            //     ->where('seniorGroupId',$group_id);
            // })
            // ->get();


            // return view('backend.RT.snConfirmvote',compact('group','group_id','listpoint','No1point'));
            \Session::flash('success','รับรองผลการเลือกตั้งเรียบร้อยแล้ว');

            return back();
        // } else {
        //     return redirect('/backend/home');
        // }
    }


    // public function selectvote($group_id, $id)
    // {
    //     $list = electionPoint::find($id);
    //     $list->draw_status = 1;
    //     $list->update();

    //     // $list=electionPoint::where('id','=',$id)
    //     // ->update(['draw_status'=>1]);

    //     //หาชื่อกลุ่ม
    //     $group=GroupSN::where('id','=',$group_id)->first();

    //     //selectหาข้อมูล เพื่อจะนำไปใส่ในตารางหน้า blade
    //     $listpoint=electionPoint::orderBy('memberPoint','desc')
    //     ->whereHas('member',function($q)use($group_id){
    //         $q->where('groupid',1)
    //         ->where('seniorGroupId',$group_id);
    //     })
    //     ->get();

    //     //selectหาข้อมูล คะแนนมากที่สุด
    //     $list1=electionPoint::orderBy('memberPoint','desc')
    //     ->whereHas('member',function($q)use($group_id){
    //         $q->where('groupid',1)
    //         ->where('seniorGroupId',$group_id);
    //     })
    //     // ->where('draw_status','!=',1)
    //     ->first();

    //     //selectหาข้อมูล คะแนนมากที่สุดมีกี่คน
    //     $list2=electionPoint::orderBy('memberPoint','desc')
    //     ->whereHas('member',function($q)use($group_id){
    //         $q->where('groupid',1)
    //         ->where('seniorGroupId',$group_id);
    //     })
    //     ->where('memberPoint','=',$list1->memberPoint)
    //     ->whereNull('draw_status')
    //     ->get();

    //     $No1point=count($list2);

    //     if($list2!=NULL){
    //         \Session::flash('success','เลือกผู้ชนะแล้ว');
    //     }else{
    //         \Session::flash('error','เลือกผู้ชนะไม่สำเร็จ!!!');
    //     }
    //     return view('backend.RT.snConfirmvote',compact('group','group_id','listpoint','No1point'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
