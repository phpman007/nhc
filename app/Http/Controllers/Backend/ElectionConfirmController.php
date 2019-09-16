<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon, Exception, DB;

use App\Model\Backend\Province;
use App\Model\Backend\GroupSN;
use App\Model\Backend\GroupNGO;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\ngoSection;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;

class ElectionConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function snEConfirm()
    {
        // if (Auth::guard('admin')->user()->can('approve_professional')) {

            $input = \Request::all();
            $listgroupsn=GroupSN::get();

            $list=Member::join('member_details','member_details.memberId','=','members.id');
            // $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
            // $list->leftJoin('province','member_details.provinceId','=','province.provinceId');
            $list->leftJoin('senior_groups', 'members.seniorGroupId', '=', 'senior_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            $list->where('members.confirmedStatus','=',1);
            $list->where('members.confirmed_at', '!=', null);
            $list->where('members.verify_status_confirm','=',1);
            $list->where('member_details.fixStatus','=',1);
            $list->where('member_details.statusId',3);
            $list->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            });
            $list->select('members.seniorGroupId','members.status_accept','member_details.fixStatus','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','senior_groups.groupName','users.username', 'member_details.updateStatusTime', 'members.confirmed_at', 'members.updated_at', 'members.confirmed_vote_at', 'members.confirmedStatus', 'members.confirmedStatus2', 'members.confirmedStatus3');

            if(!empty($input['txtname'])){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                        ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%')
                        ->orWhere('member_details.docId','like','%'.\Request::get('txtname').'%')
                        ->orWhere('members.username','like','%'.\Request::get('txtname').'%');
                });
            }else{
                $list->where('members.groupId','=',1);
            }

            if(!empty($input['txtgroup'])){
                $countgroup=count($input['txtgroup']);
                $list->where('members.groupId','=',1)
                ->where(function ($query){
                    $query->whereIn('members.seniorGroupId',\Request::get('txtgroup'));
                });

            }else{
                $list->where('members.groupId','=',1);
                $countgroup=0;
            }

            $listmember= $list->orderBy('members.id','ASC')->paginate(10)->appends($input);

            // $listmember= $list->get();

            return view('backend.eConfirm.snEConfirm',compact('listgroupsn','listmember','countgroup'));
        // } else {
        //     return redirect('/backend/home');
        // }

    }

    public function ngoEConfirm()
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {
            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty ($a)) {

                $input = \Request::all();

                // $listprovince=Province::orderBy('province')->get();
                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();
                if(!empty($input['txtsection'])){
                    $listprovince=Province::join('ngo_sections','province.provinceId','=','ngo_sections.provinceId');
                    $listprovince->whereIn('ngo_sections.section',$input['txtsection']);
                    $listprovince->select('province.provinceId','province.province');
                    $listprovince=$listprovince->orderBy('province')->get();
                }else{
                    $listprovince="";
                }

                $listgroupngo=GroupNGO::get();

                $idprovince = request()->idprovince;
                $idgroup = request()->idgroup;

                $list=Member::join('member_details','member_details.memberId','=','members.id');
                $list->leftJoin('province','member_details.provinceId','=','province.provinceId');
                $list->leftJoin('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
                $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
                $list->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId');
                $list->where('members.confirmedStatus','=',1);
                $list->where('members.confirmed_at', '!=', null);
                $list->where('members.verify_status_confirm','=',1);
                $list->where('member_details.fixStatus','=',1);
                $list->where('member_details.statusId',3);
                $list->where(function ($query) {
                    $query->where('members.deleted_at',NULL)
                    ->where('member_details.deleted_at',NULL);
                });
                $list->select('members.ngoGroupId','members.status_accept','member_details.fixStatus','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','ngo_groups.groupName','users.username', 'member_details.updateStatusTime', 'members.confirmed_at', 'members.updated_at', 'members.confirmed_vote_at', 'members.confirmedStatus', 'members.confirmedStatus2', 'members.confirmedStatus3');

                if(!empty($input['txtname'])){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) {
                        $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                            ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%')
                            ->orWhere('member_details.docId','like','%'.\Request::get('txtname').'%')
                            ->orWhere('members.username','like','%'.\Request::get('txtname').'%');
                    });

                }else{
                    $list->where('members.groupId','=',3);
                }

                if(!empty($input['txtgroup'])){
                    $countgroup=count($input['txtgroup']);
                    $list->where('members.groupId','=',3)
                    ->where(function ($query){
                        $query->whereIn('members.ngoGroupId',\Request::get('txtgroup'));
                    });

                }else{
                    $list->where('members.groupId','=',3);
                    $countgroup=0;
                }

                if(!empty($input['txtprovince'])){
                    $countprovince=count($input['txtprovince']);
                    $txtprovince = request()->input('txtprovince');

                    $list->where('members.groupId','=',3)
                    ->where(function ($query1){
                        $query1->whereIn('members.provinceId',request()->input('txtprovince'));
                    });
                }else{
                    $list->where('members.groupId','=',3);
                    $countprovince=0;
                }

                if(!empty($input['txtsection'])){
                    $countsection=count($input['txtsection']);
                    $txtsection = request()->input('txtsection');

                    $list->where('members.groupId','=',3)
                    ->where(function ($query1){
                        $query1->whereIn('ngo_sections.section',request()->input('txtsection'));
                    });

                }else{
                    $list->where('members.groupId','=',3);
                    $countsection=0;
                }

                $listmember= $list->orderBy('members.id','ASC')->paginate(10)->appends($input);
            }else{
                $listprovince="";
                $listsection="";
                $listgroup="";
                $listmember="";
                $countprovince=0;
                $countgroup=0;
                $countsection=0;
            }

            return view('backend.eConfirm.ngoEConfirm', compact ('listsection','listmember', 'listgroupngo', 'countgroup', 'listprovince', 'countprovince', 'countsection'));
        } else {
            return redirect('/backend/home');
        }
    }

}
