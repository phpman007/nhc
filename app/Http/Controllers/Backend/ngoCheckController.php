<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\ngoGroup;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ngoCheckController extends Controller
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
        $listgroupngo=ngoGroup::get();
        $liststatus=Statuses::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('users', 'member_details.adminId', '=', 'users.id');
        $list->join('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
        $list->join('ngo_sections','member_details.section','=','ngo_sections.id');
        $list->leftJoin('province','ngo_sections.provinceId','=','province.provinceId');
        $list->select('member_details.section','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.provinceId','province.province','ngo_groups.groupName','users.username');
        $list->where('members.groupId','=',3);

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

        $listmember= $list->orderBy('members.id')->paginate(10);

        return view('/backend/check/ngoCheck',compact('listprovince','listgroupngo','liststatus','listmember','countprovince','countstatus','countgroup','countsection'));
    }

    public function exportExcel(){
        $input = \Request::all();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('users', 'member_details.adminId', '=', 'users.id');
        $list->join('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
        $list->join('ngo_sections','member_details.section','=','ngo_sections.id');
        $list->leftJoin('province','ngo_sections.provinceId','=','province.provinceId');
        $list->select('member_details.section','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.province','ngo_groups.groupName','users.username');
        $list->where('members.groupId','=',3);

        if(!empty($input['Hname'])){
            $list->where('members.groupId','=',3)
            ->where(function ($query) {
                $query->where('members.firstname','like','%'.\Request::get('Hname').'%')
                      ->orWhere('members.lastname','like','%'.\Request::get('Hname').'%')
                      ->orWhere('member_details.docId','like','%'.\Request::get('Hname').'%');
            });
        }else{
            $list->where('members.groupId','=',3);
        }

        if(!empty($input['Hgroup'])){
            $countgroup=count($input['Hgroup']);
            if($countgroup==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.ngoGroupId','=',\Request::get('Hgroup')[0]);
                });
            }elseif($countgroup==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.ngoGroupId','=',\Request::get('Hgroup')[0])
                        ->orWhere('members.ngoGroupId','=',\Request::get('Hgroup')[1]);
                });
            }elseif($countgroup==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.ngoGroupId','=',\Request::get('Hgroup')[0])
                        ->orWhere('members.ngoGroupId','=',\Request::get('Hgroup')[1])
                        ->orWhere('members.ngoGroupId','=',\Request::get('Hgroup')[2]);
                });
            }
        }else{
            $list->where('members.groupId','=',3);
            $countgroup=0;
        }

        if(!empty($input['Hstatus'])){
            $countstatus=count($input['Hstatus']);
            if($countstatus==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('Hstatus')[0]);
                });
            }elseif($countstatus==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('Hstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('Hstatus')[1]);
                });
            }elseif($countstatus==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.statusId','=',\Request::get('Hstatus')[0])
                        ->orWhere('member_details.statusId','=',\Request::get('Hstatus')[1])
                        ->orWhere('member_details.statusId','=',\Request::get('Hstatus')[2]);
                });
            }
        }else{
            $countstatus=0;
            $list->where('members.groupId','=',3);
        }

        if(!empty($input['Hprovince'])){
            $countprovince=count($input['Hprovince']);
            if($countprovince==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('Hprovince')[0]);
                });
            }elseif($countprovince==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('Hprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('Hprovince')[1]);
                });
            }elseif($countprovince==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('province.provinceId','=',\Request::get('Hprovince')[0])
                        ->orWhere('province.provinceId','=',\Request::get('Hprovince')[1])
                        ->orWhere('province.provinceId','=',\Request::get('Hprovince')[2]);
                });
            }
        }else{
            $countprovince=0;
            $list->where('members.groupId','=',3);
        }

        if(!empty($input['Hsection'])){
            $countsection=count($input['Hsection']);
            if($countsection==1){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.section','=',\Request::get('Hsection')[0]);
                });
            }elseif($countsection==2){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.section','=',\Request::get('Hsection')[0])
                        ->orWhere('member_details.section','=',\Request::get('Hsection')[1]);
                });
            }elseif($countsection==3){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('member_details.section','=',\Request::get('Hsection')[0])
                        ->orWhere('member_details.section','=',\Request::get('Hsection')[1])
                        ->orWhere('member_details.section','=',\Request::get('Hsection')[2]);
                });
            }
        }else{
            $countsection=0;
            $list->where('members.groupId','=',3);
        }

        $listmember= $list->orderBy('members.id')->get();
        return view('/backend/check/ngoCheckExcel',compact('listmember'));

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
