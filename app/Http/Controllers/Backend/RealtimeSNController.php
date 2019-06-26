<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupSN;
use App\Model\Backend\Group;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class RealtimeSNController extends Controller
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
        $listgroup=GroupSN::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('groups','members.groupId','=','groups.id');
        $list->join('province','member_details.provinceId','=','province.provinceId');
        $list->join('senior_groups', 'members.seniorgroupId', '=', 'senior_groups.id');
        $list->select('members.id','members.candidateNumber','members.nameTitle','members.firstname','members.lastname','groups.groupName','senior_groups.groupName as SNgroup','province.province');
        $list->where('members.groupId','=',1);

        if(!empty($input['txtname'])){
            $list->where('member_details.statusId','=',3)
            ->where(function ($query) {
                $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                      ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%');
            });
        }else{
            $list->where('member_details.statusId','=',3);
        }

        if(!empty($input['txtgroup'])){
            $countgroup=count($input['txtgroup']);
            if($countgroup==1){
                $list->where('member_details.statusId','=',3)
                ->where(function ($query) {
                    $query->where('members.organizationGroupId','=',\Request::get('txtgroup')[0]);
                });
            }elseif($countgroup==2){
                $list->where('member_details.statusId','=',3)
                ->where(function ($query) {
                    $query->where('members.organizationGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.organizationGroupId','=',\Request::get('txtgroup')[1]);
                });
            }elseif($countgroup==3){
                $list->where('member_details.statusId','=',3)
                ->where(function ($query) {
                    $query->where('members.organizationGroupId','=',\Request::get('txtgroup')[0])
                        ->orWhere('members.organizationGroupId','=',\Request::get('txtgroup')[1])
                        ->orWhere('members.organizationGroupId','=',\Request::get('txtgroup')[2]);
                });
            }

        }else{
            $countgroup=0;
            $list->where('member_details.statusId','=',3);
        }

        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            if($countprovince==1){
                $list->where('member_details.statusId','=',3)
                ->where(function ($query) {
                    $query->where('province.province','=',\Request::get('txtprovince')[0]);
                });
            }elseif($countprovince==2){
                $list->where('member_details.statusId','=',3)
                ->where(function ($query) {
                    $query->where('province.province','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.province','=',\Request::get('txtprovince')[1]);
                });
            }elseif($countprovince==3){
                $list->where('member_details.statusId','=',3)
                ->where(function ($query) {
                    $query->where('province.province','=',\Request::get('txtprovince')[0])
                        ->orWhere('province.province','=',\Request::get('txtprovince')[1])
                        ->orWhere('province.province','=',\Request::get('txtprovince')[2]);
                });
            }
        }else{
            $countprovince=0;
            $list->where('member_details.statusId','=',3);
        }

        // if(!empty($input['txtgroup'])){
        //     $countgroup=count($input['txtgroup']);
        //     for($i=0;$i<$countgroup;$i++){
        //         if($i==0){
        //             $list->where('members.seniorgroupId','=',$input['txtgroup'][0]);
        //         }else{
        //             $list->orwhere('members.seniorgroupId','=',$input['txtgroup'][$i]);
        //         }
        //     }
        // }else{$countgroup=0;}


        // if(!empty($input['txtprovince'])){
        //     $countprovince=count($input['txtprovince']);
        //     for($i=0;$i<$countprovince;$i++){
        //         if($i==0){
        //             $list->where('province.province','=',$input['txtprovince'][0]);
        //         }else{
        //             $list->orwhere('province.province','=',$input['txtprovince'][$i]);
        //         }
        //     }
        // }else{$countprovince=0;}
        $list->orderBy('members.id');
        $listmember= $list->paginate(10)->appends($input);

        return view('/backend/RT/snRT',compact('listmember','listprovince','listgroup','countgroup','countprovince'));
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
