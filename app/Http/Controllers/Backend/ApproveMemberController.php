<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupOR;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\reason;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;

class ApproveMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(session('admin.id')==NULL){return redirect('backend/theme-build');}
        $input = \Request::all();
       //dd($input['txtgroup']);

        $listprovince=Province::orderBy('province')->get();
        $listgroupor=GroupOR::get();
        $liststatus=Statuses::get();
        // $listreason=reason::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('province','member_details.provinceId','=','province.provinceId');
        $list->join('organization_groups', 'members.organizationGroupId', '=', 'organization_groups.id');
        $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
        $list->select('members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.provinceId','province.province','organization_groups.groupName','users.username');
        $list->where('members.groupId','=',2);

        if(!empty($input['txtname'])){
            $list->where('members.candidateStatus','=',2)
            ->where(function ($query) {
                $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('member_details.docId','like','%'.\Request::get('txtname').'%');
            });
        }else{
            $list->where('members.candidateStatus','=',2);
        }

        if(!empty($input['txtgroup'])){
            $countgroup=count($input['txtgroup']);
            if($countgroup==1){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('members.organizationGroupId','=',\Request::get('txtgroup')[0]);
                });
            }elseif($countgroup==2){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('members.organizationGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.organizationGroupId','=',\Request::get('txtgroup')[1]);
                });
            }elseif($countgroup==3){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('members.organizationGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.organizationGroupId','=',\Request::get('txtgroup')[1])
                        ->orWhere('members.organizationGroupId','=',\Request::get('txtgroup')[2]);
                });
            }

        }else{
            $countgroup=0;
            $list->where('members.candidateStatus','=',2);
        }

        if(!empty($input['txtstatus'])){
            $countstatus=count($input['txtstatus']);
            if($countstatus==1){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0]);
                });
            }elseif($countstatus==2){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[1]);
                });
            }elseif($countstatus==3){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[1])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[2]);
                });
            }
        }else{
            $countstatus=0;
            $list->where('members.candidateStatus','=',2);
        }

        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            if($countprovince==1){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0]);
                });
            }elseif($countprovince==2){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[1]);
                });
            }elseif($countprovince==3){
                $list->where('members.candidateStatus','=',2)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[1])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[2]);
                });
            }
        }else{
            $countprovince=0;
            $list->where('members.candidateStatus','=',2);
        }


        $listmember= $list->orderBy('members.id')->paginate(10)->appends($input);

        //$listmember=MemberDetail::all();

        return view('/backend/approve/memApprove',compact('listprovince','listgroupor','liststatus','listmember','countprovince','countstatus','countgroup'));
    }

    public function editstatus()
    {
        $input = \Request::all();

        $list = MemberDetail::find($input['Hid'][0]);
        $list->statusId = $input['txtstatuschange'][0];

        if($list->update()){
            $this->mail($input['Hid'][0],3);
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        return back();
        // return redirect('/backend/approve/memApprove');
    }

    public function editnotpass()
    {
        $input = \Request::all();

        $list = MemberDetail::find($input['Hidmember'][0]);
        $list->reason = $input['txtreason'][0];
        $list->statusId = 4;

        if($list->update()){
            $this->mail($input['Hidmember'][0],4);
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        return back();
        // return redirect('/backend/approve/memApprove');
    }

    public function mail($id,$status)
    {   
        $list=MemberDetail::join('members','members.id','=','member_details.memberId')
        ->join('statuses','member_details.statusId','=','statuses.id')
        ->join('province','member_details.provinceId','=','province.provinceId')
        ->join('senior_groups', 'members.seniorgroupId', '=', 'senior_groups.id')
        ->leftJoin('users', 'member_details.adminId', '=', 'users.id')
        ->select('members.email','member_details.reason','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username')
        ->where('member_details.id','=',$id)
        ->first();
        $group="รับสิทธิ์ลงคะแนน ผู้แทนองค์กรส่วนท้องถิ่น";

        if($list1->email!=""){
            // Mail::to('julaluckw@gmail.com')->send(new approveMail($group,$list));
            \Session::flash('sendemail','แก้ไขสถานะ และส่งอีเมล์แจ้งเรียบร้อยแล้ว'); 
        }else{
            \Session::flash('error','แก้ไขสถานะแล้ว แต่ส่งอีเมล์แจ้งไม่ได้!!!'); 
        }                 
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
