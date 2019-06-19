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

        $listprovince=Province::select('province_code','province')->groupBy('province_code','province')->orderBy('province')->get();
        $listgroupor=GroupOR::get();
        $liststatus=Statuses::get();
        $listreason=reason::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('provinces','member_details.subDistrictId','=','provinces.district_code');
        $list->join('organization_groups', 'members.organizationGroupId', '=', 'organization_groups.id');
        $list->join('users', 'member_details.adminId', '=', 'users.id');
        $list->select('member_details.section','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','provinces.province','organization_groups.groupName','users.username');
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
            for($i=0;$i<$countgroup;$i++){
                if($i==0){
                    $list->where('members.organizationGroupId','=',$input['txtgroup'][0]);
                }else{
                    $list->orwhere('members.organizationGroupId','=',$input['txtgroup'][$i]);
                }
            }
        }else{$countgroup=0;}

        if(!empty($input['txtstatus'])){
            $countstatus=count($input['txtstatus']);
            for($i=0;$i<$countstatus;$i++){
                if($i==0){
                    $list->where('member_details.statusId','=',$input['txtstatus'][0]);
                }else{
                    $list->orwhere('member_details.statusId','=',$input['txtstatus'][$i]);
                }
            }
        }else{$countstatus=0;}

        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            for($i=0;$i<$countprovince;$i++){
                if($i==0){
                    $list->where('provinces.province','=',$input['txtprovince'][0]);
                }else{
                    $list->orwhere('provinces.province','=',$input['txtprovince'][$i]);
                }
            }
        }else{$countprovince=0;}

        if(!empty($input['txtsection'])){
            $countsection=count($input['txtsection']);
            for($i=0;$i<$countsection;$i++){
                if($i==0){
                    $list->where('member_details.section','=',$input['txtsection'][0]);
                }else{
                    $list->orwhere('member_details.section','=',$input['txtsection'][$i]);
                }
            }

        }else{$countsection=0;}
        $listmember= $list->orderBy('members.id')->paginate(10);

        //$listmember=MemberDetail::all();

        return view('/backend/approve/memApprove',compact('listprovince','listgroupor','liststatus','listmember','countprovince','listreason','countstatus','countgroup','countsection'));
    }

    public function editstatus()
    {
        $input = \Request::all();
        // dd($input);

        $list = MemberDetail::find($input['Hid'][0]);
        $list->statusId = $input['txtstatuschange'][0];


        if($list->update()){
            \Session::flash('flash_message','ok');
        }else{
            \Session::flash('flash_message','not');
        }
        return redirect('/backend/approve/memApprove');
    }

    public function editnotpass()
    {
        $input = \Request::all();
        //dd($input);
        if(!empty($input['chkreason'])){
            $countstatus=count($input['chkreason']);
            if($countstatus>0){
                $txtstatus=implode(",", $input['chkreason']);

                $list = MemberDetail::find($input['Hidmember'][0]);
                $list->reason = $txtstatus;
                $list->statusId = 4;

                if($list->update()){
                    \Session::flash('flash_message','ok');
                }else{
                    \Session::flash('flash_message','not');
                }
            }
        }else{
            \Session::flash('flash_message','not2');
        }
        return redirect('/backend/approve/memApprove');

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
