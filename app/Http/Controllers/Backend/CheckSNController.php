<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon, Exception, DB;
// use Crypt;

use App\Model\Backend\Province;
use App\Model\Backend\GroupSN;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;


class CheckSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroupsn=GroupSN::get();
            $liststatus=Statuses::get();

            $list=Member::leftJoin('member_details','member_details.memberId','=','members.id');
            $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
            $list->leftJoin('province','member_details.provinceId','=','province.provinceId');
            $list->leftJoin('senior_groups', 'members.seniorGroupId', '=', 'senior_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            $list->select('members.seniorGroupId','members.status_accept','member_details.fixStatus','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username', 'member_details.updateStatusTime', 'members.confirmed_at', 'members.updated_at');
            // $list->where('members.groupId', '=', 1);
            // $list->where('members.status_accept', '=', 1)
            $list->where('members.confirmed_at', '!=', null)
            ->where(function ($query) {
                $query->where('members.deleted_at','=',null)
                ->where('member_details.deleted_at','=',null);
            });

            // $count=$list->get();

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

            if(!empty($input['txtstatus'])){
                $countstatus=count($input['txtstatus']);
                $txtstatus = request()->input('txtstatus');

                $list->where('members.groupId','=',1)
                ->where(function ($query){
                    $query->whereIn('member_details.statusId',\Request::get('txtstatus'));
                });


                // if(in_array(0, $txtstatus) and in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0 and 1
                //     // $key = array_search(0, $txtstatus); //หาคีย์อะเรย์ตำแหน่งที่มีค่า 0
                //     // unset($txtstatus[$key]);//ลบอะเรย์ที่มีค่า 0 ออกจากอะเรย์

                //     $list->where('members.groupId','=',1)
                //     ->where(function ($query3) use($txtstatus){
                //         $query3->whereIn('member_details.statusId',$txtstatus);
                //     });

                // }elseif(in_array(0, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0  ค้นหายังไม่ยืนยัน

                //     $list->where('members.groupId','=',1)
                //     ->where(function ($query1){
                //         $query1->whereNull('members.status_accept')
                //         ->orWhere('members.status_accept','=',2)
                //         ->orWhere('members.status_accept','=',0);
                //     });
                //     $list->whereIn('member_details.statusId',[0,1]);

                // }elseif(in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 1 ค้นหารอตรวจสอบคุณสมบัติ
                //     $list->where('members.groupId','=',1)
                //     ->where(function ($query1){
                //         $query1->where('members.status_accept',1)
                //         ->where('member_details.statusId',1);
                //     });
                // }
            }else{
                $list->where('members.groupId','=',1);

                $countstatus=0;
            }

            // if(!empty($input['txtprovince'])){
            //     $countprovince=count($input['txtprovince']);
            //     $txtprovince = request()->input('txtprovince');

            //     $list->where('members.groupId','=',1)
            //     ->where(function ($query1){
            //         $query1->whereIn('member_details.provinceId',request()->input('txtprovince'));
            //     });

            // }else{
            //     $list->where('members.groupId','=',1);
            //     $countprovince=0;
            // }

            $list1=$list->get();

            $list->orderBy('members.firstname', 'ASC');
            $listmember= $list->paginate(10)->appends($input);

            $countmember1=$list1->where('seniorGroupId',1)->count();
            $countmember2=$list1->where('seniorGroupId',2)->count();
            $countmember3=$list1->where('seniorGroupId',3)->count();
            $countmember4=$list1->where('seniorGroupId',4)->count();
            $countmember5=$list1->where('seniorGroupId',5)->count();
            $countmember6=$list1->where('seniorGroupId',6)->count();


            // dd($countmember1,$countmember2,$countmember3,$countmember4,$countmember5,$countmember6);

            return view('backend.check.snCheck',compact('listprovince','listgroupsn','liststatus','listmember','countstatus','countgroup', 'countmember1', 'countmember2', 'countmember3', 'countmember4', 'countmember5', 'countmember6'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function exportExcel(){
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {

            $input = \Request::all();

            $list=Member::leftJoin('member_details','member_details.memberId','=','members.id');
            $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
            $list->leftJoin('province','member_details.provinceId','=','province.provinceId');
            $list->leftJoin('senior_groups', 'members.seniorGroupId', '=', 'senior_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            $list->select('member_details.reason','members.seniorGroupId','members.status_accept','member_details.fixStatus','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username', 'member_details.updateStatusTime', 'members.confirmed_at', 'members.updated_at');
            // $list->where('members.status_accept', '=', 1)
            $list->where('members.confirmed_at', '!=', null)
            ->where(function ($query) {
                $query->where('members.deleted_at','=',null)
                ->where('member_details.deleted_at','=',null);
            });

            if(!empty($input['Hname'])){
                $list->where('members.groupId','=',1)
                ->where(function ($query) {
                    $query->where('members.firstname','like','%'.\Request::get('Hname').'%')
                        ->orWhere('members.lastname','like','%'.\Request::get('Hname').'%')
                        ->orWhere('member_details.docId','like','%'.\Request::get('Hname').'%')
                        ->orWhere('members.username','like','%'.\Request::get('Hname').'%');
                });

            }else{
                $list->where('members.groupId','=',1);
            }

            if(!empty($input['Hgroup'])){
                $list->where('members.groupId','=',1)
                ->where(function ($query){
                    $query->whereIn('members.seniorGroupId',\Request::get('Hgroup'));
                });

            }else{
                $list->where('members.groupId','=',1);
                $countgroup=0;
            }

            if(!empty($input['Hstatus'])){

                $list->where('members.groupId','=',1)
                ->where(function ($query){
                    $query->whereIn('member_details.statusId',\Request::get('Hstatus'));
                });

            }else{
                $list->where('members.groupId','=',1);
                $countstatus=0;
            }

            // $list1=$list->get();
            $list->orderBy('members.firstname', 'ASC');
            $listmember= $list->get();

            // $countmember1=$list1->where('seniorGroupId',1)->count();
            // $countmember2=$list1->where('seniorGroupId',2)->count();
            // $countmember3=$list1->where('seniorGroupId',3)->count();
            // $countmember4=$list1->where('seniorGroupId',4)->count();
            // $countmember5=$list1->where('seniorGroupId',5)->count();
            // $countmember6=$list1->where('seniorGroupId',6)->count();

            return view('backend.check.snCheckExcel',compact('listmember'));
        } else {
            return redirect('/backend/home');
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
    public function edit($id)//ดาวน์โหลดแล้วใส่ไอดีผู้ใช้คนแรกที่กดดาวน์โหลด
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $list1=MemberDetail::where('id','=',$id)->whereNull('adminId')->first();

            if($list1!=NULL){
                $adminId=Auth::guard('admin')->user()->id;

                $list2=MemberDetail::where('memberId','=',$id)
                ->update(['adminId'=>$adminId]);

                // if($list2->update()){
                //     \Session::flash('success');
                // }else{
                //     \Session::flash('error');
                // }
            //}else{
                // \Session::flash('error');
            }
            return back();
        } else {
            return redirect('/backend/home');
        }
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

    public function editstatus()//แก้ไขกรณีสถานะ ผ่าน ,รอ ,ระหว่าง
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $input = \Request::all();

            // dd($input['txtstatuschange'][0]);

            if($input['txtstatuschange'][0]==3){//ผ่าน

                // $list2=MemberDetail::join('members','members.id','=','member_details.memberId')
                // ->select('members.candidateNumber')
                // ->where('members.groupId','=',1)
                // ->where('member_details.statusId','=',3)
                // ->orderBy('members.candidateNumber','DESC')->first();

                // if($list2==NULL){
                //     $newnumber=1;
                // }else{
                //     $newnumber=($list2->candidateNumber)+1;
                // }

                // $list3 = Member::find($input['Hid'][0]);
                // $list3->candidateNumber = $newnumber;

                $list=MemberDetail::where('memberId','=',$input['Hid'][0])
                ->update(['reason'=>NULL,'statusId'=>$input['txtstatuschange'][0], 'adminId'=>Auth::guard('admin')->user()->id, 'updateStatusTime'=>date('Y-m-d H:i:s')]);

                // $idprovince = $input['Hidprovince'][0];

                // $list2 = Member::where('groupId','=','3');
                // $list2->where('ngoGroupId', $input['Hidgroup'][0]);
                // $list2->whereHas('detail', function($query3) use($idprovince){
                //     $query3->where('provinceId','=',$idprovince);
                //     $query3->whereIn('statusId', [1,2]);
                // });

                // $liststatus2 = $list2->get();

            }else{//สถานะรอตรวจสอบ สถานะระหว่างตรวจสอบ
                $list=MemberDetail::where('memberId','=',$input['Hid'][0])
                ->update(['reason'=>NULL,'statusId'=>$input['txtstatuschange'][0], 'adminId'=>Auth::guard('admin')->user()->id, 'updateStatusTime'=>date('Y-m-d H:i:s')]);
            }

            if($list!=NULL){
                // $this->mail($input['Hid'][0],3);//ส่งเมล์กรณีผ่าน
                \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
            }else{
                \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
            }
            // return redirect('/backend/approve/snApprove');
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function editnotpass()//แก้ไขสถานะกรณีไม่ผ่าน
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $input = \Request::all();

            $list=MemberDetail::where('memberId','=',$input['Hidmember'][0])
            ->update(['reason'=>$input['txtreason'][0], 'statusId'=>4, 'adminId'=>Auth::guard('admin')->user()->id, 'updateStatusTime'=>date('Y-m-d H:i:s')]);

            // $list3 = Member::find($input['Hidmember'][0]);
            // $list3->candidateNumber = 0;

            if($list!=NULL){
                //  $this->mail($input['Hidmember'][0],4);//ส่งเมล์กรณีไม่ผ่าน
                \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
            }else{
                \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
            }

            // return redirect('/backend/approve/snApprove');
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function snPreview($id,$name,$group1,$group2,$group3,$status1,$status2,$status3)
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $liststatus=Statuses::get();
            // $member2=Member::where('groupId',1)
            // ->where('status_accept','=',1)
            // ->orderBy('id')->get();

            $list=MemberDetail::join('members','members.id','=','member_details.memberId');
            $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
            $list->leftJoin('province','member_details.provinceId','=','province.provinceId');
            $list->leftJoin('senior_groups', 'members.seniorGroupId', '=', 'senior_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            $list->select('members.seniorGroupId','members.status_accept','member_details.fixStatus','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username', 'member_details.updateStatusTime');
            // $list->where('members.status_accept',1);
            $list->where('members.confirmed_at', '!=', null);
            $list->where('member_details.statusId','!=',2)
            // $list->where('member_details.docId','!=',null)
            ->where(function ($query) {
                $query->where('members.deleted_at','=',null)
                ->where('member_details.deleted_at','=',null);
            });

            if($name != '0'){
                $list->where('members.groupId','=',1)
                ->where(function ($query) use($name) {
                    $query->where('members.firstname','like','%'.$name.'%')
                        ->orWhere('members.lastname','like','%'.$name.'%')
                        ->orWhere('member_details.docId','like','%'.$name.'%');
                });
            }else{
                $list->where('members.groupId',1);
            }

            if($group1 != '0'){
                $list->where('members.groupId','=',1)
                ->where(function ($query) use($group1,$group2,$group3){
                    $query->whereIn('members.seniorGroupId',[$group1,$group2,$group3]);
                });
            }else{
                $list->where('members.groupId','=',1);
            }

            if($status1 != '0'){
                $list->where('members.groupId','=',1)
                ->where(function ($query) use($status1,$status2,$status3){
                    $query->whereIn('member_details.statusId',[$status1,$status2,$status3]);
                });
            }else{
                $list->where('members.groupId','=',1);
            }

            $member2= $list->orderBy('member_details.updated_at','ASC')->get();
    // dd($member2, $name, $a);

            //preview รหัสที่คลิก
            $member=Member::where('id','=',$id)->first();

            return view('backend.preview.snPreview', compact('member','member2','liststatus','name','group1','group2','group3','status1','status2','status3'));

        } else {
            return redirect('/backend/home');
        }
    }

    public function ngoPreview($id,$name,$group1,$group2,$group3,$status1,$status2,$status3,$section1,$section2,$section3,$pro1,$pro2,$pro3)
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $liststatus=Statuses::get();
            // $member2=Member::where('groupId',3)
            // ->where('status_accept','=',1)
            // ->orderBy('id')->get();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            // if(!empty($a)) {
            if(true) {

                $list=Member::leftJoin('member_details','member_details.memberId','=','members.id');
                $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
                $list->leftJoin('province','members.provinceId','=','province.provinceId');
                $list->leftJoin('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
                $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
                $list->leftJoin('ngo_sections','members.provinceId','=','ngo_sections.provinceId');
                $list->select('ngo_sections.section','members.ngoGroupId','members.status_accept','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','ngo_groups.groupName','users.username', 'users.sectionControl', 'member_details.updateStatusTime');

                // $list->where('members.status_accept',1);
                $list->where('members.confirmed_at', '!=', null)
                // $list->where('member_details.docId','!=',null)
                ->where(function ($query) {
                    $query->where('members.deleted_at','=',null)
                    ->where('member_details.deleted_at','=',null);
                });
                // $list->where('members.groupId',3);

                if($name != '0'){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) use($name) {
                        $query->where('members.firstname','like','%'.$name.'%')
                            ->orWhere('members.lastname','like','%'.$name.'%')
                            ->orWhere('member_details.docId','like','%'.$name.'%');
                    });
                }else{
                    $list->where('members.groupId',3);
                }

                if($group1 != '0'){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) use($group1,$group2,$group3){
                        $query->whereIn('members.ngoGroupId',[$group1,$group2,$group3]);
                    });
                }else{
                    $list->where('members.groupId','=',3);
                }

                if($status1 != '0'){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) use($status1,$status2,$status3){
                        $query->whereIn('member_details.statusId',[$status1,$status2,$status3]);
                    });
                }else{
                    $list->where('members.groupId','=',3);
                }

                if($section1 != '0'){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) use($section1,$section2,$section3){
                        $query->whereIn('ngo_sections.section',[$section1,$section2,$section3]);
                    });
                }else{
                    $list->where('members.groupId','=',3);
                }

                if($pro1 != '0'){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) use($pro1,$pro2,$pro3){
                        $query->whereIn('members.provinceId',[$pro1,$pro2,$pro3]);
                    });
                }else{
                    $list->where('members.groupId','=',3);
                }

                $member2= $list->orderBy('member_details.updated_at','ASC')->get();
            }else{
                $member2="";
            }

            $member=Member::where('id',$id)->first();

            return view('backend.preview.ngoPreview', compact('member','member2','liststatus','name','group1','group2','group3','status1','status2','status3','section1','section2','section3','pro1','pro2','pro3'));

        } else {
            return redirect('/backend/home');
        }
    }

    public function orPreview($id)
    {
        $liststatus=Statuses::get();
        $member2=Member::where('groupId',2)->where('status_accept','=','1')->where('candidateStatus',1)->orderBy('id')->get();
        $member=Member::where('id',$id)->first();
        return view('backend.preview.orPreview', compact('member','member2','liststatus'));
    }

    public function memPreview($id)
    {
        $liststatus=Statuses::get();
        $member2=Member::where('groupId',2)->where('status_accept','=','1')->where('candidateStatus',2)->orderBy('id')->get();
        $member=Member::where('id',$id)->first();
        return view('backend.preview.memPreview', compact('member','member2','liststatus'));
    }

    public function snPreviewV($id)
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $liststatus=Statuses::get();
            $member2=Member::where('groupId',1)
            ->where('members.confirmed_at', '=', null)
            ->orWhere('status_accept','!=','1')
            // ->whereHas('detail', function ($query1){
            //     $query1->where('statusId','<>',0);
            // })
            ->orderBy('id')->get();
            $member=Member::where('id',$id)->first();

            // dd($member2);
            return view('backend.preview.snPreviewV', compact('member','member2','liststatus'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function ngoPreviewV($id)
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $liststatus=Statuses::get();
            $member2=Member::where('groupId',3)
            ->where('members.confirmed_at', '=', null)
            ->orWhere('status_accept','!=','1')
            // ->where('status_accept','=','1')
            // ->whereHas('detail', function ($query1){
            //     $query1->whereIn('statusId',[1,2,3,4]);
            // })
            ->orderBy('id')->get();
            $member=Member::where('id',$id)->first();

            return view('backend.preview.ngoPreviewV', compact('member','member2','liststatus'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function orPreviewV($id)
    {
        $liststatus=Statuses::get();
        $member2=Member::where('groupId',2)->where('status_accept','=','1')->where('candidateStatus',1)->orderBy('id')->get();
        $member=Member::where('id',$id)->first();
        return view('backend.preview.orPreviewV', compact('member','member2','liststatus'));
    }

    public function memPreviewV($id)
    {
        $liststatus=Statuses::get();
        $member2=Member::where('groupId',2)->where('status_accept','=','1')->where('candidateStatus',2)->orderBy('id')->get();
        $member=Member::where('id',$id)->first();
        return view('backend.preview.memPreviewV', compact('member','member2','liststatus'));
    }

}
