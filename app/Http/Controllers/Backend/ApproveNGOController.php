<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupNGO;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\reason;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ApproveNGOController extends Controller
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
        $listgroupor=GroupNGO::get();
        $liststatus=Statuses::get();
        // $listreason=reason::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
        $list->join('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
        $list->join('ngo_sections','member_details.section','=','ngo_sections.id');
        $list->join('province','ngo_sections.provinceId','=','province.provinceId');
        $list->select('member_details.section','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.provinceId','province.province','ngo_groups.groupName','users.username');

        if(!empty($input['txtname'])){
            $list->where('members.groupId','=',3)
            ->where(function ($query) {
                $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('member_details.docId','like','%'.\Request::get('txtname').'%');
            });
        }else{
            $list->where('members.groupId','=',3);
        }

        if(!empty($input['txtgroup'])){
            $countgroup=count($input['txtgroup']);
            if($countgroup==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.ngoGroupId','=',\Request::get('txtgroup')[0]);
                });
            }elseif($countgroup==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.ngoGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.ngoGroupId','=',\Request::get('txtgroup')[1]);
                });
            }elseif($countgroup==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.ngoGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.ngoGroupId','=',\Request::get('txtgroup')[1])
                        ->orWhere('members.ngoGroupId','=',\Request::get('txtgroup')[2]);
                });
            }
        }else{
            $list->where('members.groupId','=',3);
            $countgroup=0;
        }

        if(!empty($input['txtstatus'])){
            $countstatus=count($input['txtstatus']);
            if($countstatus==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0]);
                });
            }elseif($countstatus==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[1]);
                });
            }elseif($countstatus==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[1])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[2]);
                });
            }
        }else{
            $countstatus=0;
            $list->where('members.groupId','=',3);
        }

        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            if($countprovince==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0]);
                });
            }elseif($countprovince==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[1]);
                });
            }elseif($countprovince==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[1])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[2]);
                });
            }
        }else{
            $countprovince=0;
            $list->where('members.groupId','=',3);
        }

        if(!empty($input['txtsection'])){
            $countsection=count($input['txtsection']);
            if($countsection==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.section','=',\Request::get('txtsection')[0]);
                });
            }elseif($countsection==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.section','=',\Request::get('txtsection')[0])
                        ->orWhere('member_details.section','=',\Request::get('txtsection')[1]);
                });
            }elseif($countsection==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.section','=',\Request::get('txtsection')[0])
                        ->orWhere('member_details.section','=',\Request::get('txtsection')[1])
                        ->orWhere('member_details.section','=',\Request::get('txtsection')[2]);
                });
            }
        }else{
            $countsection=0;
            $list->where('members.groupId','=',3);
        }

        $listmember= $list->orderBy('members.id')->paginate(10)->appends($input);

        return view('/backend/approve/ngoApprove',compact('listprovince','listgroupor','liststatus','listmember','countprovince','countstatus','countgroup','countsection'));
    }

    public function editstatus()
    {
        $input = \Request::all();
        // dd($input);

        $list = MemberDetail::find($input['Hid'][0]);
        $list->statusId = $input['txtstatuschange'][0];


        if($list->update()){
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
}
