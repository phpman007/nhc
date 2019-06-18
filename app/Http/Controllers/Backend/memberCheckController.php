<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\organizationGroup;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class memberCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = \Request::all();

        $listprovince=Province::select('province_code','province')->groupBy('province_code','province')->orderBy('province')->get();
        $listgroupor=organizationGroup::get();
        $liststatus=Statuses::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('provinces','member_details.subDistrictId','=','provinces.district_code');
        $list->join('organization_groups', 'members.organizationGroupId', '=', 'organization_groups.id');
        $list->join('users', 'member_details.adminId', '=', 'users.id');
        $list->select('members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','provinces.province','organization_groups.groupName','users.username');
        if(!empty($input['txtname'])){
            $list->where('members.firstname','like',"%".$input['txtname']."%");
            $list->orwhere('members.lastname','like',"%".$input['txtname']."%");
            $list->orwhere('member_details.docId','like',"%".$input['txtname']."%");
        }
        if(!empty($input['txtgroup'])){
            $list->where('members.organizationGroupId','=',$input['txtgroup']);
        }
        if(!empty($input['txtstatus'])){
            $list->where('member_details.statusId','=',$input['txtstatus']);
        }
        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            for($i=0;$i<$countprovince;$i++){
                $list->orwhere('provinces.province','=',$input['txtprovince'][$i]);
            }
        }else{$countprovince=0;}
        $listmember= $list->orderBy('members.id')->paginate(10);

        return view('/backend/check/memCheck',compact('listprovince','listgroupor','liststatus','listmember','countprovince'));
    }

    // public function adminCheck()
    // {
    //     $input = \Request::all();

    //     $list = MemberDetail::find($input['Hid'][0]);
    //     $list->statusId = $input['txtstatuschange'][0];

    //     if($list->update()){
    //         \Session::flash('flash_message','ok');
    //     }else{
    //         \Session::flash('flash_message','not');
    //     }
    //     return redirect('/backend/check/index');
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
