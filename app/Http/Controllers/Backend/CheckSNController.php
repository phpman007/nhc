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

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CheckSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = \Request::all();

        $listprovince=Province::orderBy('province')->get();
        $listgroupsn=GroupSN::get();
        $liststatus=Statuses::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('province','member_details.provinceId','=','province.provinceId');
        $list->join('senior_groups', 'members.seniorgroupId', '=', 'senior_groups.id');
        $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
        $list->select('members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username');

        if(!empty($input['txtname'])){
            $list->where('members.groupId','=',1)
            ->where(function ($query) {
                $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('member_details.docId','like','%'.\Request::get('txtname').'%');
            });
        }else{
            $list->where('members.groupId','=',1);
        }

        if(!empty($input['txtgroup'])){
            $countgroup=count($input['txtgroup']);
            if($countgroup==1){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.seniorGroupId','=',\Request::get('txtgroup')[0]);
                });
            }elseif($countgroup==2){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.seniorGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.seniorGroupId','=',\Request::get('txtgroup')[1]);
                });
            }elseif($countgroup==3){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.seniorGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.seniorGroupId','=',\Request::get('txtgroup')[1])
                        ->orWhere('members.seniorGroupId','=',\Request::get('txtgroup')[2]);
                });
            }
        }else{
            $list->where('members.groupId','=',1);
            $countgroup=0;
        }

        if(!empty($input['txtstatus'])){
            $countstatus=count($input['txtstatus']);
            if($countstatus==1){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0]);
                });
            }elseif($countstatus==2){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[1]);
                });
            }elseif($countstatus==3){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('txtstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[1])
                        ->orWhere('member_details.statusId','=',\Request::get('txtstatus')[2]);
                });
            }
        }else{
            $countstatus=0;
            $list->where('members.groupId','=',1);
        }

        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            if($countprovince==1){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0]);
                });
            }elseif($countprovince==2){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[1]);
                });
            }elseif($countprovince==3){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[1])
                        ->orWhere('province.provinceId','=',\Request::get('txtprovince')[2]);
                });
            }
        }else{
            $countprovince=0;
            $list->where('members.groupId','=',1);
        }

        $listmember= $list->orderBy('members.id')->paginate(10);

        return view('/backend/check/snCheck',compact('listprovince','listgroupsn','liststatus','listmember','countprovince','countstatus','countgroup'));
    }

    public function exportExcel(){
        $input = \Request::all();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('province','member_details.provinceId','=','province.provinceId');
        $list->join('senior_groups', 'members.seniorgroupId', '=', 'senior_groups.id');
        $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
        $list->select('members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.province','senior_groups.groupName','users.username');
        $list->where('members.groupId','=',1);

        if(!empty($input['Hname'])){
            $list->where('members.groupId','=',1)
            ->where(function ($query) {
                $query->where('members.firstname','like','%'.\Request::get('Hname').'%')
                      ->orWhere('members.lastname','like','%'.\Request::get('Hname').'%')
                      ->orWhere('member_details.docId','like','%'.\Request::get('Hname').'%');
            });
        }else{
            $list->where('members.groupId','=',1);
        }

        if(!empty($input['Hgroup'])){
            $countgroup=count($input['Hgroup']);
            if($countgroup==1){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.seniorGroupId','=',\Request::get('Hgroup')[0]);
                });
            }elseif($countgroup==2){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.seniorGroupId','=',\Request::get('Hgroup')[0])
                        ->orWhere('members.seniorGroupId','=',\Request::get('Hgroup')[1]);
                });
            }elseif($countgroup==3){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.seniorGroupId','=',\Request::get('Hgroup')[0])
                        ->orWhere('members.seniorGroupId','=',\Request::get('Hgroup')[1])
                        ->orWhere('members.seniorGroupId','=',\Request::get('Hgroup')[2]);
                });
            }
        }else{
            $list->where('members.groupId','=',1);
            $countgroup=0;
        }

        if(!empty($input['Hstatus'])){
            $countstatus=count($input['Hstatus']);
            if($countstatus==1){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('Hstatus')[0]);
                });
            }elseif($countstatus==2){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('Hstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('Hstatus')[1]);
                });
            }elseif($countstatus==3){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('Hstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('Hstatus')[1])
                        ->orWhere('member_details.statusId','=',\Request::get('Hstatus')[2]);
                });
            }
        }else{
            $countstatus=0;
            $list->where('members.groupId','=',1);
        }

        if(!empty($input['Hprovince'])){
            $countprovince=count($input['Hprovince']);
            if($countprovince==1){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('Hprovince')[0]);
                });
            }elseif($countprovince==2){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('Hprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('Hprovince')[1]);
                });
            }elseif($countprovince==3){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('Hprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('Hprovince')[1])
                        ->orWhere('province.provinceId','=',\Request::get('Hprovince')[2]);
                });
            }
        }else{
            $countprovince=0;
            $list->where('members.groupId','=',1);
        }

        $listmember= $list->orderBy('members.id')->get();

        return view('/backend/check/snCheckExcel',compact('listmember'));

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
