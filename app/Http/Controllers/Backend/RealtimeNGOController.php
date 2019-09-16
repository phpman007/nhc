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

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use DB;

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

        $listgroup=GroupNGO::get();

        return view('/backend/RT/ngoRT',compact('listgroup'));
    }

    public function ngoRTAll($group_id)
    {
        //selectหาข้อมูล electionPoint
        $listpoint=electionPoint::orderBy('draw_status','desc')->orderBy('memberPoint','desc')
        ->whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        ->get();

        //หาชื่อกลุ่ม
        $group=GroupNGO::where('id','=',$group_id)->first();

        //หาวันที่ เวลา การลงคะแนน
        $listelection=election::where('groupid',3)
        ->where('seniorGroupId',$group_id)
        ->first();

        //หาข้อมูลผู้ชนะในกลุ่มนั้น
        $listwin=electionPoint::orderBy('memberPoint','desc')
        ->whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        ->where('draw_status',1)
        ->get();

        $listvote = electionVote::selectRaw('*,sum(point) as sumPoints')
        ->whereHas('memberVoteTo',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        ->groupBy('voteTo')
        ->orderBy('sumPoints','desc')
        ->get();

        // dd($listvote, $listpoint);

        return view('backend.RT.ngoRTAll',compact('group','group_id','listwin','listvote','listelection','listpoint'));
    }

    public function comfirmvote($group_id)
    {
        //หาชื่อกลุ่ม
        $group=GroupNGO::where('id','=',$group_id)->first();

         //selectหาข้อมูลว่ามีการรวมคะแนนไว้ใน electionpoint หรือยัง ถ้ายังก็ให้รวมข้อมูลจากตาราง electionvote ไปใส่ในตาราง electionpoint
         $listpoint=electionPoint::whereHas('member',function($q)use($group_id){
             $q->where('groupid',3)
             ->where('seniorGroupId',$group_id);
         })
         ->get();

        if($listpoint->isEmpty()){

            //ข้อมูล sum point จากตาราง electionvote select ขึ้นมาเพื่อนำไปใส่ในตาราง electionpoint
            $list = electionVote::selectRaw('*,sum(point) as sumPoints')
            ->whereHas('memberVoteTo',function($q)use($group_id){
                $q->where('groupid',3)
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
                electionPoint::create($data);
            }

            //selectหาข้อมูล คะแนนมากที่สุด
            $list1=electionPoint::orderBy('memberPoint','desc')
            ->whereHas('member',function($q)use($group_id){
                $q->where('groupid',3)
                ->where('seniorGroupId',$group_id);
            })
            // ->where('draw_status','!=',1)
            ->first();


            if(!empty($list1)){
                //selectหาข้อมูล คะแนนมากที่สุดมีกี่คน
                $list2=electionPoint::orderBy('memberPoint','desc')
                ->whereHas('member',function($q)use($group_id){
                    $q->where('groupid',3)
                    ->where('seniorGroupId',$group_id);
                })
                ->where('memberPoint','=',$list1->memberPoint)
                // ->whereNull('draw_status')
                ->get();

                $No1point=count($list2);

            }else{
                $No1point=0;
            }

            //ถ้าคนที่ได้มากที่สุดมี 1 คน ให้ draw_status=1
            if($No1point==1){
                $id=$list2->first()->id;

                $list = electionPoint::find($id);
                $list->draw_status = 1;
                $list->update();
            }
        }else{
            //selectหาข้อมูล คะแนนมากที่สุด
            $list1=electionPoint::orderBy('memberPoint','desc')
            ->whereHas('member',function($q)use($group_id){
                $q->where('groupid',3)
                ->where('seniorGroupId',$group_id);
            })
            // ->where('draw_status','!=',1)
            ->first();


            if(!empty($list1)){
                //selectหาข้อมูล คะแนนมากที่สุดมีกี่คน
                $list2=electionPoint::orderBy('memberPoint','desc')
                ->whereHas('member',function($q)use($group_id){
                    $q->where('groupid',3)
                    ->where('seniorGroupId',$group_id);
                })
                ->where('memberPoint','=',$list1->memberPoint)
                // ->whereNull('draw_status')
                ->get();

                $No1point=count($list2);

            }else{
                $No1point=0;
            }
        }

        //selectหาข้อมูล เพื่อจะนำไปใส่ในตารางหน้า blade
        $listpoint=electionPoint::orderBy('memberPoint','desc')
        ->whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        ->get();


        return view('backend.RT.ngoConfirmvote',compact('group','group_id','listpoint','No1point'));
    }


    public function selectvote($group_id, $id)
    {

        $list = electionPoint::find($id);
        $list->draw_status = 1;
        $list->update();

        // $list=electionPoint::where('id','=',$id)
        // ->update(['draw_status'=>1]);

        //หาชื่อกลุ่ม
        $group=GroupNGO::where('id','=',$group_id)->first();

        //selectหาข้อมูล เพื่อจะนำไปใส่ในตารางหน้า blade
        $listpoint=electionPoint::orderBy('memberPoint','desc')
        ->whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        ->get();

        //selectหาข้อมูล คะแนนมากที่สุด
        $list1=electionPoint::orderBy('memberPoint','desc')
        ->whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        // ->where('draw_status','!=',1)
        ->first();

        //selectหาข้อมูล คะแนนมากที่สุดมีกี่คน
        $list2=electionPoint::orderBy('memberPoint','desc')
        ->whereHas('member',function($q)use($group_id){
            $q->where('groupid',3)
            ->where('seniorGroupId',$group_id);
        })
        ->where('memberPoint','=',$list1->memberPoint)
        ->whereNull('draw_status')
        ->get();

        $No1point=count($list2);

        if($list2!=NULL){
            \Session::flash('success','เลือกผู้ชนะแล้ว');
        }else{
            \Session::flash('error','เลือกผู้ชนะไม่สำเร็จ!!!');
        }
        return view('backend.RT.ngoConfirmvote',compact('group','group_id','listpoint','No1point'));

        // return back();
    }

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
