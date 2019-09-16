<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\ngoGroup;
use App\Model\Backend\Province;
use App\Model\Backend\organizationGroup;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;

use Illuminate\Support\Facades\Auth;

class ViewNGOController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_ngo')) {

            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroupngo=ngoGroup::get();
            // $liststatus=Statuses::get();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            // if(!empty ($a)) {

            if (true) {

            $list=Member::leftjoin('member_details','member_details.memberId','=','members.id');
            $list->leftjoin('statuses','member_details.statusId','=','statuses.id');
            $list->leftjoin('province','members.provinceId','=','province.provinceId');
            $list->leftjoin('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            $list->leftJoin('ngo_sections','members.provinceId','=','ngo_sections.provinceId');
            $list->select('ngo_sections.section','members.ngoGroupId','members.status_accept','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','ngo_groups.groupName','users.username','members.created_at','members.confirmed_at');
            // $list->whereNull('members.confirmed_at');

            $list->where('members.groupId','=',3);
            $list->whereNull('members.confirmed_at');

            // ->where(function ($query) {
            //     $query->where('members.status_accept','=',null)
            //         ->orWhere('members.status_accept','=',2)
            //         ->orWhere('members.confirmed_at','=',null);
            // });

            // $list->whereIn('ngo_sections.section',$a);

            if(!empty($input['txtname'])){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.firstname','like','%'.\Request::get('txtname').'%')
                        ->orWhere('members.lastname','like','%'.\Request::get('txtname').'%')
                        ->orWhere('member_details.docId','like','%'.\Request::get('txtname').'%');
                });
            } else {
                $list->where('members.groupId','=',3);
            }

            if(!empty($input['txtgroup'])){
                $countgroup=count($input['txtgroup']);
                $list->where('members.groupId','=',3)
                ->where(function ($query){
                    $query->whereIn('members.ngoGroupId',\Request::get('txtgroup'));
                });
            } else {
                $list->where('members.groupId','=',3);
                $countgroup=0;
            }

            // if(!empty($input['txtstatus'])){
            //     $countstatus=count($input['txtstatus']);
            //     $txtstatus = request()->input('txtstatus');

            //     if(in_array(0, $txtstatus) and in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0 and 1
            //         // $key = array_search(0, $txtstatus); //หาคีย์อะเรย์ตำแหน่งที่มีค่า 0
            //         // unset($txtstatus[$key]);//ลบอะเรย์ที่มีค่า 0 ออกจากอะเรย์

            //         $list->where('members.groupId','=',3)
            //         ->where(function ($query3) use($txtstatus){
            //             $query3->whereIn('member_details.statusId',$txtstatus);
            //         });

            //     } elseif (in_array(0, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0  ค้นหายังไม่ยืนยัน

            //         $list->where('members.groupId','=',3)
            //         ->where(function ($query1){
            //             $query1->whereNull('members.status_accept')
            //             ->orWhere('members.status_accept','=',2)
            //             ->orWhere('members.status_accept','=',0);
            //         });
            //         $list->whereIn('member_details.statusId',[0,1]);

            //     } elseif (in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 1 ค้นหารอตรวจสอบคุณสมบัติ
            //         $list->where('members.groupId','=',3)
            //         ->where(function ($query1){
            //             $query1->where('members.status_accept',1)
            //             ->where('member_details.statusId',1);
            //         });
            //     }
            // } else {
            //     $list->where('members.groupId','=',3);
            //     $countstatus=0;
            // }

            if (!empty($input['txtprovince'])){
                $countprovince=count($input['txtprovince']);
                $txtprovince = request()->input('txtprovince');

                $list->where('members.groupId','=',3)
                ->where(function ($query1){
                    $query1->whereIn('members.provinceId',request()->input('txtprovince'));
                });

            } else {
                $list->where('members.groupId','=',3);
                $countprovince=0;
            }

            if (!empty($input['txtsection'])){
                $countsection=count($input['txtsection']);
                $txtsection = request()->input('txtsection');

                $list->where('members.groupId','=',3)
                ->where(function ($query1){
                    $query1->whereIn('ngo_sections.section',request()->input('txtsection'));
                });

            } else {
                $list->where('members.groupId','=',3);
                $countsection=0;
            }



            $listmember= $list->orderBy('member_details.updated_at','ASC')->paginate(10)->appends($input);

            // $listmember= $list->orderBy('member_details.updated_at','ASC')->get();

        } else {
            $countsection=0;
            $countgroup=0;
            $countprovince=0;
            // $countstatus=0;
        }

            return view('backend.view.ngoView',compact('listprovince','listgroupngo','listmember','countprovince','countgroup','countsection'));

        } else {
            return redirect('/backend/home');
        }
    }

    public function exportExcel()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_ngo')) {

            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroupngo=ngoGroup::get();
            // $liststatus=Statuses::get();

            // $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            // if(!empty ($a)) {

            if (true) {

            $list=Member::leftjoin('member_details','member_details.memberId','=','members.id');
            $list->leftjoin('statuses','member_details.statusId','=','statuses.id');
            $list->leftjoin('province','members.provinceId','=','province.provinceId');
            $list->leftjoin('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            $list->leftJoin('ngo_sections','members.provinceId','=','ngo_sections.provinceId');
            $list->select('members.id','member_details.docId','members.personalId','members.nameTitle','members.firstname','members.lastname','member_details.tel','member_details.mobile','ngo_groups.groupName','members.ngoGroupId','members.created_at','member_details.updated_at','members.last_step','member_details.legalStastus');

            $list->where(function ($query) {
                $query->where('members.confirmed_at', '=', null)
                ->orWhere('members.status_accept', '!=', 1)
                ->orWhere('members.status_accept', '=', null);
            });
            // $list->whereNull('members.confirmed_at');

            $list->where('members.groupId','=',3)
            ->where(function ($query) {
                $query->where('members.status_accept','=',null)
                    ->orWhere('members.status_accept','!=',1);
            });

            // $list->whereIn('ngo_sections.section',$a);

            if(!empty($input['Hname'])){
                $list->where('members.groupId','=',3)
                ->where(function ($query) {
                    $query->where('members.firstname','like','%'.\Request::get('Hname').'%')
                        ->orWhere('members.lastname','like','%'.\Request::get('Hname').'%')
                        ->orWhere('member_details.docId','like','%'.\Request::get('Hname').'%');
                });
            } else {
                $list->where('members.groupId','=',3);
            }

            if(!empty($input['Hgroup'])){
                $countgroup=count($input['Hgroup']);
                $list->where('members.groupId','=',3)
                ->where(function ($query){
                    $query->whereIn('members.ngoGroupId',\Request::get('Hgroup'));
                });
            } else {
                $list->where('members.groupId','=',3);
                $countgroup=0;
            }

            if (!empty($input['Hprovince'])){
                $countprovince=count($input['Hprovince']);
                $txtprovince = request()->input('Hprovince');

                $list->where('members.groupId','=',3)
                ->where(function ($query1){
                    $query1->whereIn('members.provinceId',request()->input('Hprovince'));
                });

            } else {
                $list->where('members.groupId','=',3);
                $countprovince=0;
            }

            if (!empty($input['Hsection'])){
                $countsection=count($input['Hsection']);
                $txtsection = request()->input('Hsection');

                $list->where('members.groupId','=',3)
                ->where(function ($query1){
                    $query1->whereIn('ngo_sections.section',request()->input('Hsection'));
                });

            } else {
                $list->where('members.groupId','=',3);
                $countsection=0;
            }

            $listmember= $list->orderBy('member_details.updated_at','ASC')->get();

        }

            return view('backend.view.NGOviewExcel',compact('listmember'));

        }
    }
}
