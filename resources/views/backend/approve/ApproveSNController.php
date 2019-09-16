<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupSN;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\reason;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;

use DB;
use PDF;


use Illuminate\Support\Facades\Auth;

class ApproveSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $listgroupsn=GroupSN::get();

            return view('backend.approve.snApprove',compact('listgroupsn'));
        } else {
            return redirect('/backend/home');
        }
    }



    public function editstatus()
    {
        $input = \Request::all();

        if($input['txtstatuschange'][0]==3){

            $list2=MemberDetail::join('members','members.id','=','member_details.memberId')
            ->select('members.candidateNumber')
            ->where('members.groupId','=',1)
            ->where('member_details.statusId','=',3)
            ->orderBy('members.candidateNumber','DESC')->first();

            if($list2==NULL){
                $newnumber=1;
            }else{
                $newnumber=($list2->candidateNumber)+1;
            }

            $list3 = Member::find($input['Hid'][0]);
            $list3->candidateNumber = $newnumber;

            $list = MemberDetail::find($input['Hid'][0]);
            $list->statusId = $input['txtstatuschange'][0];

        }else{
            $list = MemberDetail::find($input['Hid'][0]);
            $list->statusId = $input['txtstatuschange'][0];

            $list3 = Member::find($input['Hid'][0]);
            $list3->candidateNumber = 0;
        }

        if($list->update() and $list3->update()){
            \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        // return redirect('/backend/approve/snApprove');
        return back();
    }

    public function editnotpass()
    {
        $input = \Request::all();

        $list = MemberDetail::find($input['Hidmember'][0]);
        $list->reason = $input['txtreason'][0];
        $list->statusId = 4;

        $list3 = Member::find($input['Hidmember'][0]);
        $list3->candidateNumber = 0;

        if($list->update() and $list3->update()){
            \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }

        // return redirect('/backend/approve/snApprove');
        return back();
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

    public function snApproveAll()
    {
        $input = \Request::all();

        $liststatus = Statuses::get();
        $idgroup = request()->idgroup;

        $list2 = Member::where('groupId','=','1');
        $list2->where('seniorGroupId', $idgroup);
        $list2->whereHas('detail', function($query3) {
            $query3->whereIn('statusId', [1,2]);
        });

        $list3 = Member::where('groupId','=','1');
        $list3->where('seniorGroupId', $idgroup);
        $list3->whereHas('detail', function($query4) {
            $query4->whereIn('statusId', [3,4]);
            $query4->where('fixStatus','=',1);
        });

        $liststatus2 = $list2->get();
        $liststatus3 = $list3->get();


        if(empty($input['txtname'])){
            $list=Member::where('groupId','=',1)->where('seniorGroupId', $idgroup)->orderBy('id');

        }else{

            $list=Member::where('seniorGroupId', $idgroup);

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

        return view('backend.approve.snApproveAll', compact ('listmember', 'liststatus', 'liststatus2', 'liststatus3'));
    }

    public function editfixstatus($id)
    {
        $list=MemberDetail::join('members','members.id','=','member_details.memberId')
        ->where('members.groupId','=',1)
        ->where('members.seniorGroupId','=',$id)
        ->whereIn('member_details.statusId',[0,1,2])
        ->get();

        if(count($list)==0){
            $list2=DB::statement("update member_details,members set member_details.fixStatus=1, member_details.approveDate='".date("Y-m-d H:i:s")."' where members.groupId=1 and members.seniorGroupId=".$id." and members.status_accept=1 and member_details.memberId=members.id and member_details.statusId in (3,4)");
            if($list2){

                $list3=Member::where('groupId',1)
                ->where('seniorGroupId',$id)
                ->where('status_accept',1)
                ->whereHas('detail', function($query2) {
                    $query2->where('fixStatus',1)
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
                        // $group="ผู้ทรงคุณวุฒิ";
                        // $this->mail($list3, $group);

                        // return redirect('backend/approve/pdfSN/'.$id);
                    }else{
                        \Session::flash('error','ยืนยันการอนุมัติไม่ได้!');
                    }
                }else{
                    \Session::flash('error','ยืนยันการอนุมัติไม่ได้!!');
                }

            }else{
                \Session::flash('error','ยืนยันการอนุมัติไม่ได้!!!');
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
                $sendmail=Mail::to($val->email)->send(new approveMail($val->nameTitle, $val->firstname, $val->lastname, $val->detail->province->province, $val->detail->statusId, $group, $val->detail->reason));
                // $val->email
            }
        }

        // dd($sendmail);
        // if($this->mail($list, $groupname)){
            \Session::flash('success','ส่งอีเมล์เรียบร้อยแล้ว');
        // }else{
        //     \Session::flash('error','ส่งอีเมล์ไม่ได้!');
        // }
    }

    public function exportWord($id){
        $list=Member::where('groupId',1)
        ->where('seniorGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->get();

        $list2=Member::where('groupId',1)
        ->where('seniorGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->first();

        $groupname="ผู้ทรงคุณวุฒิ ".$list2->groupSN->groupName;



        return view('backend.approve.wordNumber',compact('id','list','groupname'));
    }

    public function genPDF($id){
        $list=Member::where('groupId',1)
        ->where('seniorGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->get();

        $list2=Member::where('groupId',1)
        ->where('seniorGroupId',$id)
        ->whereHas('detail', function($query2) {
            $query2->where('fixStatus',1)
            ->where('statusId',3);
        })
        ->orderBy('candidateNumber')->first();

        $groupname="ผู้ทรงคุณวุฒิ ".$list2->groupSN->groupName;

        $pdf = PDF::loadView('/backend/approve/pdfNumber', ['list'=>$list,'groupname'=>$groupname]);
        $path='pdf/approve/approveSN'.$id.'.pdf';

        $pdf->save(public_path($path));
        // return @$pdf->stream('/backend/approve/pdfSN');



        $list4 = GroupSN::find($id);
        $list4->pdf_path = $path;
        $list4->update();

        //ส่งเมล์
        $this->mail($id,$groupname);

        return back();

        // $path = public_path('pdf/professional/pdfSN-'. $id .'.pdf');
        // $pdf->stream('/backend/approve/pdfSN')->save($path);
        // return @$pdf->stream('/backend/approve/pdfSN');
        // return $pdf->download('candidateNumberSN'.$id.'.pdf');

    }
}
