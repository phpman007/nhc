<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupNGO;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\election;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\reason;
use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;

class ApproveNGOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            $input = \Request::all();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty($a)) {
                $listprovince=Province::join('ngo_sections','province.provinceId','=','ngo_sections.provinceId')
                ->whereIn('ngo_sections.section',$a)
                ->orderBy('province.province')
                ->get();
            }else{
                $listprovince="";
            }

            $listgroupngo=GroupNGO::get();

            return view('backend.approve.ngoApprove',compact('listprovince','listgroupngo'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function ngoapprove()
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            $input = \Request::all();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty($a)) {
                $listprovince=Province::join('ngo_sections','province.provinceId','=','ngo_sections.provinceId')
                ->whereIn('ngo_sections.section',$a)
                ->orderBy('province.province')
                ->get();
            }else{
                $listprovince="";
            }

            $listgroupngo="";

            return view('backend.approve.ngoApprove',compact('listprovince','listgroupngo'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function editstatus()
    {
        $input = \Request::all();
        // dd($input);

        $list = MemberDetail::find($input['Hid'][0]);
        $list->statusId = $input['txtstatuschange'][0];


        if($list->update()){
            // $this->mail($input['Hid'][0],3);
            \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        return back();
        // return redirect('/backend/approve/ngoApprove');
    }

    public function editnotpass()
    {
        $input = \Request::all();

        $list = MemberDetail::find($input['Hidmember'][0]);
        $list->reason = $input['txtreason'][0];
        $list->statusId = 4;

        if($list->update()){
            // $this->mail($input['Hidmember'][0],4);
            \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        return back();
        // return redirect('/backend/approve/ngoApprove');

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



    public function ngoApproveAll($idprovince, $idgroup)
    {
        $input = \Request::all();

        $liststatus=Statuses::get();
        // $list = Member::where('groupId','=','3');
        // $list->where('ngoGroupId', $idgroup);
        // $list->whereHas('detail', function($query2) use($idprovince){
        //     $query2->where('provinceId','=',$idprovince);
        // });
        // $listmember =$list->orderBy('id')->paginate(10);

        if(empty($input['txtname'])){
            $list=Member::where('groupId','=',3)->where('ngoGroupId', $idgroup)
            ->whereHas('detail', function($query2) use($idprovince){
                $query2->where('provinceId','=',$idprovince);
            })
            ->orderBy('id');

        }else{

            $list=Member::where('ngoGroupId', $idgroup)
            ->whereHas('detail', function($query2) use($idprovince){
                $query2->where('provinceId','=',$idprovince);
            });

            if(!empty($input['txtname'])){
                $txtname = request()->input('txtname');

                $list->where('groupId','=',1)
                ->where(function ($query) use($txtname) {
                    $query->where('firstname','like','%'.$txtname.'%')
                        ->orWhere('lastname','like','%'.$txtname.'%')
                        ->orWhereHas('detail', function($query2) use($txtname){
                            $query2->where('docId','Like','%'.$txtname.'%');
                        });
                });
            }

        }
        $listmember= $list->orderBy('id')->paginate(10)->appends($input);

        $list2 = Member::where('groupId','=','3');
        $list2->where('ngoGroupId', $idgroup);
        $list2->whereHas('detail', function($query3) use($idprovince){
            $query3->where('provinceId','=',$idprovince);
            $query3->whereIn('statusId', [1,2]);
        });

        $list3 = Member::where('groupId','=','3');
        $list3->where('ngoGroupId', $idgroup);
        $list3->whereHas('detail', function($query4) use($idprovince){
            $query4->where('provinceId','=',$idprovince);
            $query4->whereIn('statusId', [3,4]);
            $query4->where('fixStatus','=',1);
        });

        $liststatus2 = $list2->get();
        $liststatus3 = $list3->get();

        return view('/backend/approve/ngoApproveAll', compact ('listmember', 'liststatus', 'liststatus2', 'liststatus3'));
    }


    public function editfixstatus($idprovince , $idgroup)
    {
        $list=MemberDetail::join('members','members.id','=','member_details.memberId')
        ->where('members.groupId','=',3)
        ->where('member_details.provinceId','=',$idprovince)
        ->where('members.ngoGroupId','=',$idgroup)
        ->whereIn('member_details.statusId',[0,1,2])
        ->get();

        if(count($list)==0){
            $list2=DB::statement("update member_details,members set member_details.fixStatus=1, member_details.approveDate='".date("Y-m-d H:i:s")."' where members.groupId=3 and members.ngoGroupId=".$idgroup." and member_details.provinceId=".$idprovince." and members.status_accept=1 and member_details.memberId=members.id and member_details.statusId in (3,4)");
            if($list2){

                $list3=Member::where('groupId',3)
                ->where('ngoGroupId',$idgroup)
                ->where('status_accept',1)
                ->whereHas('detail', function($query2) use($idprovince) {
                    $query2->where('fixStatus',1)
                           ->where('provinceId',$idprovince)
                           ->where('statusId',3);
                })
                ->orderBy('firstname')->get();


                if(!empty($list3)){
                    foreach($list3 as $key => $vallist){
                        $list4 = Member::find($vallist->id);
                        $list4->candidateNumber = $key+1;
                        $list4->update();
                    }

                    if($list4!=NULL){
                        \Session::flash('success','อนุมัติเรียบร้อยแล้ว');
                        // $group="ผู้แทนองค์กรภาคเอกชน";
                        // $this->mail($list3, $group);
                        // return redirect('backend/approve/pdfNGO/'.$idgroup);
                    }else{
                        \Session::flash('error','ยืนยันการอนุมัติไม่ได้!!!');
                    }
                }else{
                    \Session::flash('error','ยืนยันการอนุมัติไม่ได้!!!');
                }

            }else{
                \Session::flash('error','ยืนยันการอนุมัติแล้ว แต่ส่งอีเมล์แจ้งไม่ได้!!!');
            }
        }else{
            \Session::flash('error','กรุณาแก้ไขสถานะให้เรียบร้อยก่อนยืนยันการอนุมัติ!!!');
        }
        return back();
    }

    public function mail($id, $group)
    {
        $list=Member::where('groupId',3)
        ->where('ngoGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->whereIn('statusId',[3,4]);
        })
        ->orderBy('candidateNumber')->get();

        foreach($list as $val){
            if(!empty($val->nameTitle)){
                Mail::to($val->email)->send(new approveMail($val->nameTitle, $val->firstname, $val->lastname, $val->detail->province->province, $val->detail->statusId, $group, $val->detail->reason));
            }
        }
        \Session::flash('success','ส่งอีเมล์เรียบร้อยแล้ว');
    }

    public function exportWord($id){
        $list=Member::where('groupId',3)
        ->where('seniorGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->get();

        $list2=Member::where('groupId',3)
        ->where('seniorGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->first();

        $groupname="ผู้แทนองค์กรภาคเอกชน ".$list2->groupSN->groupName;

        return view('backend.approve.wordNumber',compact('id','list','groupname'));
    }

    public function genPDF($id){

        $list=Member::where('groupId',3)
        ->where('ngoGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->get();

        $list2=Member::where('groupId',3)
        ->where('ngoGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->first();

        $groupname="ผู้แทนองค์กรภาคเอกชน ".$list2->groupNGO->groupName;

        $pdf = PDF::loadView('/backend/approve/pdfNumber', ['list'=>$list,'groupname'=>$groupname]);
        $path='pdf/approve/approveNGO'.$id.'.pdf';

        $pdf->save(public_path($path));

        $list4 = GroupNGO::find($id);
        $list4->pdf_path = $path;
        $list4->update();

         //ส่งเมล์
         $this->mail($id, $groupname);

        return back();
    }

}
