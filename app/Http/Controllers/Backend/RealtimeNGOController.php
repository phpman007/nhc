<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupNGO;
use App\Model\Backend\Group;
use App\Model\Backend\Member;
use App\Model\Backend\electionVote;
use App\Model\Backend\electionPoint;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\election;
use App\Model\Backend\ngoSection;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;

use Illuminate\Support\Facades\Auth;

class RealtimeNGOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = \Request::all();

        $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty($input['txtsection']) and !empty($input['txtprovince']) and !empty($input['txtlevel']) and !empty($a)){
                // $listsection=ngoSection::whereIn('section',$a)
                // ->groupBy('section')
                // ->orderBy('section')
                // ->get();

                if($input['txtlevel']==1){

                    $listsection = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
                    ->join('province','members.provinceId','=','province.provinceId')
                    ->where('members.groupId','=',3)
                    // ->where('members.ngoGroupId','=',$group_id)
                    // ->where('members.provinceId','=',10)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->select('ngo_sections.section')
                    ->groupBy('ngo_sections.section')
                    ->orderBy('members.provinceId')
                    ->get();

                    $listprovince=ngoSection::join('province','ngo_sections.provinceId','=','province.provinceId')
                    ->where('section',$input['txtsection'])
                    ->whereIn('ngo_sections.section',$a)
                    ->select('province.province','ngo_sections.provinceId')
                    ->orderBy('ngo_sections.id')
                    ->get();

                    $listgroupngo = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
                    ->join('province','members.provinceId','=','province.provinceId')
                    ->where('members.groupId','=',3)
                    // ->where('members.ngoGroupId','=',$group_id)
                    // ->where('members.provinceId','=',10)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->select('members.ngoGroupId','ngo_groups.groupName')
                    ->groupBy('members.ngoGroupId')
                    ->orderBy('members.provinceId')
                    ->get();
                }else{
                    $listsection = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
                    ->join('province','members.provinceId','=','province.provinceId')
                    ->where('members.groupId','=',3)
                    // ->where('members.ngoGroupId','=',$group_id)
                    // ->where('members.provinceId','=',10)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->select('ngo_sections.section')
                    ->groupBy('ngo_sections.section')
                    ->orderBy('members.provinceId')
                    ->get();

                    $listgroupngo="";
                    $listprovince="";
                }

            }elseif(!empty($input['txtsection']) and !empty($input['txtprovince']) and !empty($a)){
                $listsection = Member::join('member_details','members.id','=','member_details.memberId')
                ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
                ->join('province','members.provinceId','=','province.provinceId')
                ->where('members.groupId','=',3)
                // ->where('members.ngoGroupId','=',$group_id)
                // ->where('members.provinceId','=',10)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->whereIn('ngo_sections.section',$a)
                ->select('ngo_sections.section')
                ->groupBy('ngo_sections.section')
                ->orderBy('members.provinceId')
                ->get();

                $listprovince=ngoSection::join('province','ngo_sections.provinceId','=','province.provinceId')
                ->where('section',$input['txtsection'])
                ->select('province.province','ngo_sections.provinceId')
                ->orderBy('ngo_sections.id')
                ->get();

                $listgroupngo="";

            }elseif(!empty($input['txtsection']) and !empty($a)){
                $listsection = Member::join('member_details','members.id','=','member_details.memberId')
                ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
                ->join('province','members.provinceId','=','province.provinceId')
                ->where('members.groupId','=',3)
                // ->where('members.ngoGroupId','=',$group_id)
                // ->where('members.provinceId','=',10)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->whereIn('ngo_sections.section',$a)
                ->select('ngo_sections.section')
                ->groupBy('ngo_sections.section')
                ->orderBy('members.provinceId')
                ->get();

                $listprovince=ngoSection::join('province','ngo_sections.provinceId','=','province.provinceId')
                ->where('section',$input['txtsection'])
                ->select('province.province','ngo_sections.provinceId')
                ->orderBy('ngo_sections.id')
                ->get();

                $listgroupngo="";

            }else{
                $listsection = Member::join('member_details','members.id','=','member_details.memberId')
                ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
                ->join('province','members.provinceId','=','province.provinceId')
                ->where('members.groupId','=',3)
                // ->where('members.ngoGroupId','=',$group_id)
                // ->where('members.provinceId','=',10)
                ->where('member_details.statusId',3)
                // ->where('members.verify_status_confirm',1)
                ->where('members.confirmedStatus','=',1)
                ->where('members.confirmed_at', '!=', null)
                ->where('member_details.fixStatus','=',1)
                ->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                })
                ->whereIn('ngo_sections.section',$a)
                ->select('ngo_sections.section')
                ->groupBy('ngo_sections.section')
                ->orderBy('members.provinceId')
                ->get();

                $listgroupngo="";
                $listprovince="";
            }

            return view('/backend/RT/ngoRT',compact('listgroupngo','listprovince','listsection'));
    }

    public function ngoRTAll($group_id, $provinceid, $sectionid, $level)
    {
        $input = \Request::all();

        $a=json_decode(Auth::guard('admin')->user()->sectionControl);
        if(!empty ($a)) {
            //จำนวนคนที่มีสิทธิ์ลงคะแนน
            $listcount = Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',$group_id)
            ->where('members.provinceId','=',$provinceid)
            ->where('member_details.statusId',3)
            ->where('members.verify_status_confirm',1)
            ->where('members.confirmedStatus','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->whereIn('ngo_sections.section',$a)
            ->get();

            $canelection=count($listcount);

            if($canelection>0 and in_array($sectionid,$a) and $level==1){
                // dd($canelection, in_array($sectionid,$a), $sectionid);

                //จำนวนคนที่มาลงคะแนน
                $listcount = electionVote::whereHas('memberVoteTo',function($q)use($group_id){
                    $q->where('groupid',3)
                    ->where('ngoGroupId',$group_id);
                })
                ->where('voteTo',"!=",0)
                ->select('memberId')
                ->groupBy('memberId')
                ->get();

                $vote=count($listcount);

                //จำนวนคนที่ไม่ประสงค์ลงคะแนน
                $listcount = electionVote::whereHas('memberVoteTo',function($q)use($group_id){
                    $q->where('groupid',3)
                    ->where('ngoGroupId',$group_id);
                })
                ->where('voteTo',"=",0)
                ->select('memberId')
                ->groupBy('memberId')
                ->get();
                $notvote=count($listcount);

                //selectหาข้อมูล electionPoint
                $listpoint=electionPoint::orderBy('draw_status','desc')->orderBy('memberPoint','desc')
                ->whereHas('member',function($q)use($group_id){
                    $q->where('groupid',3)
                    ->where('ngoGroupId',$group_id);

                })
                ->where('round',$level)
                ->get();
                if(count($listpoint)>0){
                    foreach($listpoint as  $key=>$val){
                        $b[$key]=$val->memberId;
                    }

                    $listpoint2 = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->where('members.groupId','=',3)
                    ->where('members.ngoGroupId','=',$group_id)
                    ->where('members.provinceId','=',$provinceid)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->whereNotIn('members.id',$b)
                    ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                    ->orderBy('members.candidateNumber')
                    ->get();
                }else{
                    $listpoint2 = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->where('members.groupId','=',3)
                    ->where('members.ngoGroupId','=',$group_id)
                    ->where('members.provinceId','=',$provinceid)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                    ->orderBy('members.candidateNumber')
                    ->get();
                }

                // dd($listpoint[0]->member);

                //หาชื่อกลุ่ม
                $group=GroupNGO::where('id','=',$group_id)->first();

                //รวมคะแนน
                $listvote = electionVote::selectRaw('*,sum(point) as sumPoints')
                ->whereHas('memberVoteTo',function($q)use($group_id){
                    $q->where('groupid',1)
                    ->where('ngoGroupId',$group_id);
                })
                ->groupBy('voteTo')
                ->orderBy('sumPoints','desc')
                ->get();

                if(count($listvote)>0){
                    foreach($listvote as  $key=>$val){
                        $c[$key]=$val->voteTo;
                    }

                    $listvote2 = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->where('members.groupId','=',3)
                    ->where('members.ngoGroupId','=',$group_id)
                    ->where('members.provinceId','=',$provinceid)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->whereNotIn('members.id',$c)
                    ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                    ->orderBy('members.candidateNumber')
                    ->get();
                }else{
                    $listvote2 = Member::join('member_details','members.id','=','member_details.memberId')
                    ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                    ->where('members.groupId','=',3)
                    ->where('members.ngoGroupId','=',$group_id)
                    ->where('members.provinceId','=',$provinceid)
                    ->where('member_details.statusId',3)
                    // ->where('members.verify_status_confirm',1)
                    ->where('members.confirmedStatus','=',1)
                    ->where('members.confirmed_at', '!=', null)
                    ->where('member_details.fixStatus','=',1)
                    ->where(function ($query) {
                        $query->where('members.deleted_at',NULL)
                        ->where('member_details.deleted_at',NULL);
                    })
                    ->whereIn('ngo_sections.section',$a)
                    ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber')
                    ->orderBy('members.candidateNumber')
                    ->get();
                }
                return view('backend.RT.ngoRTAll',compact('provinceid', 'sectionid', 'level','vote','notvote','group','group_id','listvote','listvote2','listpoint','listpoint2','canelection'));
            }else{
                return back();
            }
        }else{
            return back();
        }

        // //selectหาข้อมูล electionPoint
        // $listpoint=electionPoint::orderBy('draw_status','desc')->orderBy('memberPoint','desc')
        // ->whereHas('member',function($q)use($group_id){
        //     $q->where('groupid',3)
        //     ->where('seniorGroupId',$group_id);
        // })
        // ->get();

        // //หาชื่อกลุ่ม
        // $group=GroupNGO::where('id','=',$group_id)->first();

        // //หาวันที่ เวลา การลงคะแนน
        // $listelection=election::where('groupid',3)
        // ->where('seniorGroupId',$group_id)
        // ->first();

        // //หาข้อมูลผู้ชนะในกลุ่มนั้น
        // $listwin=electionPoint::orderBy('memberPoint','desc')
        // ->whereHas('member',function($q)use($group_id){
        //     $q->where('groupid',3)
        //     ->where('seniorGroupId',$group_id);
        // })
        // ->where('draw_status',1)
        // ->get();

        // $listvote = electionVote::selectRaw('*,sum(point) as sumPoints')
        // ->whereHas('memberVoteTo',function($q)use($group_id){
        //     $q->where('groupid',3)
        //     ->where('seniorGroupId',$group_id);
        // })
        // ->groupBy('voteTo')
        // ->orderBy('sumPoints','desc')
        // ->get();

        // // dd($listvote, $listpoint);

        // return view('backend.RT.ngoRTAll',compact('group','group_id','listwin','listvote','listelection','listpoint'));
    }

    public function confirmvote()
    {
        $input = \Request::all();
        $group_id=$input['Hidgroup'][0];
        $idmember=$input['Hidmember'][0];

        //หาชื่อกลุ่ม
        $group=GroupNGO::where('id','=',$group_id)->first();

        //selectหาข้อมูลว่ามีการรวมคะแนนไว้ใน electionpoint หรือยัง ถ้ายังก็ให้รวมข้อมูลจากตาราง electionvote ไปใส่ในตาราง electionpoint
        $listpoint=electionPoint::whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('ngoGroupId',$group_id);
        })
        ->get();

        if($listpoint->isEmpty()){

            //ข้อมูล sum point จากตาราง electionvote select ขึ้นมาเพื่อนำไปใส่ในตาราง electionpoint
            $list = electionVote::selectRaw('*,sum(point) as sumPoints')
            ->whereHas('memberVoteTo',function($q)use($group_id){
                $q->where('groupid',3)
                ->where('ngoGroupId',$group_id);
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

        }
        \Session::flash('success','รับรองผลการเลือกตั้งเรียบร้อยแล้ว');
        return back();
    }


    // public function selectvote($group_id, $id)
    // {

    //     $list = electionPoint::find($id);
    //     $list->draw_status = 1;
    //     $list->update();

    //     // $list=electionPoint::where('id','=',$id)
    //     // ->update(['draw_status'=>1]);

    //     //หาชื่อกลุ่ม
    //     $group=GroupNGO::where('id','=',$group_id)->first();

    //     //selectหาข้อมูล เพื่อจะนำไปใส่ในตารางหน้า blade
    //     $listpoint=electionPoint::orderBy('memberPoint','desc')
    //     ->whereHas('member',function($q)use($group_id){
    //         $q->where('groupid',3)
    //         ->where('seniorGroupId',$group_id);
    //     })
    //     ->get();

    //     //selectหาข้อมูล คะแนนมากที่สุด
    //     $list1=electionPoint::orderBy('memberPoint','desc')
    //     ->whereHas('member',function($q)use($group_id){
    //         $q->where('groupid',3)
    //         ->where('seniorGroupId',$group_id);
    //     })
    //     // ->where('draw_status','!=',1)
    //     ->first();

    //     //selectหาข้อมูล คะแนนมากที่สุดมีกี่คน
    //     $list2=electionPoint::orderBy('memberPoint','desc')
    //     ->whereHas('member',function($q)use($group_id){
    //         $q->where('groupid',3)
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
    //     return view('backend.RT.ngoConfirmvote',compact('group','group_id','listpoint','No1point'));

    //     // return back();
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
