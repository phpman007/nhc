<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\GroupSN;
use App\Model\Backend\ngoGroup;
use App\Model\Backend\Province;
use App\Model\Backend\organizationGroup;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use Illuminate\Support\Facades\Redirect;
use App\Model\Backend\Admin;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class memberCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_organize')) {
            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroupor=organizationGroup::get();
            $liststatus=Statuses::get();

            if(empty($input['txtname']) and empty($input['txtgroup']) and empty($input['txtstatus']) and empty($input['txtprovince'])){
                $list=Member::where('groupId','=',2)->where('candidateStatus','=',2)->where('status_accept','=',1);
                $countgroup=0;
                $countprovince=0;
                $countstatus=0;
            }else{
                $list=Member::where('groupId','=',2)->where('status_accept','=',1);

                if(!empty($input['txtname'])){
                    $txtname = request()->input('txtname');

                    $list->where('candidateStatus','=',2)
                    ->where(function ($query) use($txtname) {
                        $query->where('firstname','like','%'.$txtname.'%')
                            ->orWhere('lastname','like','%'.$txtname.'%')
                            ->orWhereHas('detail', function($query2) use($txtname){
                                $query2->where('docId','Like','%'.$txtname.'%');
                            });
                    });
                }

                if(!empty($input['txtgroup'])){
                    $countgroup=count($input['txtgroup']);
                    if($countgroup==1){
                        $list->where('candidateStatus','=',2)
                        ->where(function ($query) {
                            $query->where('organizationGroupId','=',\Request::get('txtgroup')[0]);
                        });
                    }elseif($countgroup==2){
                        $list->where('candidateStatus','=',2)
                        ->where(function ($query) {
                            $query->where('organizationGroupId','=',\Request::get('txtgroup')[0])
                                ->orWhere('organizationGroupId','=',\Request::get('txtgroup')[1]);
                        });
                    }elseif($countgroup==3){
                        $list->where('candidateStatus','=',2)
                        ->where(function ($query) {
                            $query->where('organizationGroupId','=',\Request::get('txtgroup')[0])
                                ->orWhere('organizationGroupId','=',\Request::get('txtgroup')[1])
                                ->orWhere('organizationGroupId','=',\Request::get('txtgroup')[2]);
                        });
                    }
                }else{
                    $countgroup=0;
                }

                if(!empty($input['txtstatus'])){
                    $countstatus=count($input['txtstatus']);
                    $txtstatus = request()->input('txtstatus');

                    if($countstatus==1){
                        $list->where('candidateStatus','=',2)
                        ->whereHas('detail', function ($query) use($txtstatus) {
                            $query->where('statusId','=',$txtstatus[0]);
                        });
                    }elseif($countstatus==2){
                        $list->where('candidateStatus','=',2)
                        ->whereHas('detail', function ($query) use($txtstatus) {
                            $query->where('statusId','=',$txtstatus[0])
                                ->orWhere('statusId','=',$txtstatus[1]);
                        });
                    }elseif($countstatus==3){
                        $list->where('candidateStatus','=',2)
                        ->whereHas('detail', function ($query) use($txtstatus) {
                            $query->where('statusId','=',$txtstatus[0])
                                ->orWhere('statusId','=',$txtstatus[1])
                                ->orWhere('statusId','=',$txtstatus[2]);
                        });
                    }
                }else{
                    $countstatus=0;
                }

                if(!empty($input['txtprovince'])){
                    $countprovince=count($input['txtprovince']);
                    $txtprovince = request()->input('txtprovince');

                    if($countprovince==1){
                        $list->where('candidateStatus','=',2)
                        ->whereHas('detail', function ($query) use($txtprovince) {
                            $query->where('provinceId','=',$txtprovince[0]);
                        });
                    }elseif($countprovince==2){
                        $list->where('candidateStatus','=',2)
                        ->whereHas('detail', function ($query) use($txtprovince) {
                            $query->where('provinceId','=',$txtprovince[0])
                                ->OrWhere('provinceId','=',$txtprovince[1]);
                        });
                    }elseif($countprovince==3){
                        $list->where('candidateStatus','=',2)
                        ->whereHas('detail', function ($query) use($txtprovince) {
                            $query->where('provinceId','=',$txtprovince[0])
                                ->OrWhere('provinceId','=',$txtprovince[1])
                                ->OrWhere('provinceId','=',$txtprovince[2]);
                        });
                    }
                }else{
                    $countprovince=0;
                }
            }

            $listmember= $list->orderBy('id')->paginate(10)->appends($input);

            return view('/backend/check/memCheck',compact('listprovince','listgroupor','liststatus','listmember','countprovince','countstatus','countgroup'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function exportExcel(){

        $input = \Request::all();

        if(empty($input['Hname']) and empty($input['Hgroup']) and empty($input['Hstatus']) and empty($input['Hprovince'])){
            $list=Member::where('groupId','=',2)->where('candidateStatus','=',2)->where('status_accept','=',1);

            $countgroup=0;
            $countprovince=0;
            $countstatus=0;
        }else{
            $list=Member::where('groupId','=',2)->where('status_accept','=',1);

            if(!empty($input['Hname'])){
                $txtname = request()->input('Hname');

                $list->where('candidateStatus','=',2)
                ->where(function ($query) use($txtname) {
                    $query->where('firstname','like','%'.$txtname.'%')
                        ->orWhere('lastname','like','%'.$txtname.'%')
                        ->orWhereHas('detail', function($query2) use($txtname){
                            $query2->where('docId','Like','%'.$txtname.'%');
                        });
                });
            }

            if(!empty($input['Hgroup'])){
                $countgroup=count($input['Hgroup']);
                if($countgroup==1){
                    $list->where('candidateStatus','=',2)
                    ->where(function ($query) {
                        $query->where('organizationGroupId','=',\Request::get('Hgroup')[0]);
                    });
                }elseif($countgroup==2){
                    $list->where('candidateStatus','=',2)
                    ->where(function ($query) {
                        $query->where('organizationGroupId','=',\Request::get('Hgroup')[0])
                            ->orWhere('organizationGroupId','=',\Request::get('Hgroup')[1]);
                    });
                }elseif($countgroup==3){
                    $list->where('candidateStatus','=',2)
                    ->where(function ($query) {
                        $query->where('organizationGroupId','=',\Request::get('Hgroup')[0])
                            ->orWhere('organizationGroupId','=',\Request::get('Hgroup')[1])
                            ->orWhere('organizationGroupId','=',\Request::get('Hgroup')[2]);
                    });
                }
            }else{
                $countgroup=0;
            }

            if(!empty($input['Hstatus'])){
                $countstatus=count($input['Hstatus']);
                $txtstatus = request()->input('Hstatus');

                if($countstatus==1){
                    $list->where('candidateStatus','=',2)
                    ->whereHas('detail', function ($query) use($txtstatus) {
                        $query->where('statusId','=',$txtstatus[0]);
                    });
                }elseif($countstatus==2){
                    $list->where('candidateStatus','=',2)
                    ->whereHas('detail', function ($query) use($txtstatus) {
                        $query->where('statusId','=',$txtstatus[0])
                            ->orWhere('statusId','=',$txtstatus[1]);
                    });
                }elseif($countstatus==3){
                    $list->where('candidateStatus','=',2)
                    ->whereHas('detail', function ($query) use($txtstatus) {
                        $query->where('statusId','=',$txtstatus[0])
                            ->orWhere('statusId','=',$txtstatus[1])
                            ->orWhere('statusId','=',$txtstatus[2]);
                    });
                }
            }else{
                $countstatus=0;
            }

            if(!empty($input['Hprovince'])){
                $countprovince=count($input['Hprovince']);
                $txtprovince = request()->input('Hprovince');

                if($countprovince==1){
                    $list->where('candidateStatus','=',2)
                    ->whereHas('detail', function ($query) use($txtprovince) {
                        $query->where('provinceId','=',$txtprovince[0]);
                    });
                }elseif($countprovince==2){
                    $list->where('candidateStatus','=',2)
                    ->whereHas('detail', function ($query) use($txtprovince) {
                        $query->where('provinceId','=',$txtprovince[0])
                            ->OrWhere('provinceId','=',$txtprovince[1]);
                    });
                }elseif($countprovince==3){
                    $list->where('candidateStatus','=',2)
                    ->whereHas('detail', function ($query) use($txtprovince) {
                        $query->where('provinceId','=',$txtprovince[0])
                            ->OrWhere('provinceId','=',$txtprovince[1])
                            ->OrWhere('provinceId','=',$txtprovince[2]);
                    });
                }
            }else{
                $countprovince=0;
            }
        }

        $listmember= $list->orderBy('id')->get();

        return view('/backend/check/memCheckExcel',compact('listmember'));
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
        $input = \Request::all();

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
            ->update(['reason'=>NULL,'statusId'=>$input['txtstatuschange'][0]]);

        }else{//สถานะรอตรวจสอบ สถานะระหว่างตรวจสอบ
            $list=MemberDetail::where('memberId','=',$input['Hid'][0])
            ->update(['reason'=>NULL,'statusId'=>$input['txtstatuschange'][0]]);
        }

        if($list!=NULL){
            $this->mail($input['Hid'][0],3);//ส่งเมล์กรณีผ่าน
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        // return redirect('/backend/approve/snApprove');
        return back();
    }

    public function editnotpass()//แก้ไขสถานะกรณีไม่ผ่าน
    {
        $input = \Request::all();

        $list=MemberDetail::where('memberId','=',$input['Hidmember'][0])
        ->update(['reason'=>$input['txtreason'][0], 'statusId'=>4]);

        // $list3 = Member::find($input['Hidmember'][0]);
        // $list3->candidateNumber = 0;

        if($list!=NULL){
             $this->mail($input['Hidmember'][0],4);//ส่งเมล์กรณีไม่ผ่าน
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }

        // return redirect('/backend/approve/snApprove');
        return back();
    }

    public function mail($id,$status)
    {
        // $list=MemberDetail::join('members','members.id','=','member_details.memberId')
        // ->join('statuses','member_details.statusId','=','statuses.id')
        // ->join('province','members.provinceId','=','province.provinceId')
        // ->join('senior_groups', 'members.seniorgroupId', '=', 'senior_groups.id')
        // ->leftJoin('users', 'member_details.adminId', '=', 'users.id')
        // ->select('member_details.fixStatus','members.email','member_details.reason','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username')
        // ->where('member_details.memberId','=',$id)
        // ->first();
        $list=Member::where('id','=',$id)->first();

        $group="ผู้ทรงคุณวุฒิ";

        if($list->email!=""){
            // Mail::to('julaluckw@gmail.com')->send(new approveMail($group,$list));
            \Session::flash('sendemail','แก้ไขสถานะเรียบร้อยแล้ว');
        }else{
            \Session::flash('error','แก้ไขสถานะแล้ว แต่ส่งอีเมล์แจ้งไม่ได้!!!');
        }
    }

    public function snView()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_professional')) {
            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroupsn=GroupSN::get();
            $liststatus=Statuses::get();

            $list=MemberDetail::join('members','members.id','=','member_details.memberId');
            $list->leftjoin('statuses','member_details.statusId','=','statuses.id');
            $list->leftjoin('province','members.provinceId','=','province.provinceId');
            $list->leftjoin('senior_groups', 'members.seniorGroupId', '=', 'senior_groups.id');
            $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
            // $list->leftJoin('ngo_sections', 'members.provinceId', '=', 'ngo_sections.provinceid');
            $list->select('members.seniorGroupId','members.status_accept','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','senior_groups.groupName','users.username','members.created_at','members.confirmed_at');
            $list->whereNull('members.confirmed_at');

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

                if(in_array(0, $txtstatus) and in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0 and 1
                    // $key = array_search(0, $txtstatus); //หาคีย์อะเรย์ตำแหน่งที่มีค่า 0
                    // unset($txtstatus[$key]);//ลบอะเรย์ที่มีค่า 0 ออกจากอะเรย์

                    $list->where('members.groupId','=',1)
                    ->where(function ($query3) use($txtstatus){
                        $query3->whereIn('member_details.statusId',$txtstatus);
                    });

                }elseif(in_array(0, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0  ค้นหายังไม่ยืนยัน

                    $list->where('members.groupId','=',1)
                    ->where(function ($query1){
                        $query1->whereNull('members.status_accept')
                        ->orWhere('members.status_accept','=',2)
                        ->orWhere('members.status_accept','=',0);
                    });
                    $list->whereIn('member_details.statusId',[0,1]);

                }elseif(in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 1 ค้นหารอตรวจสอบคุณสมบัติ
                    $list->where('members.groupId','=',1)
                    ->where(function ($query1){
                        $query1->where('members.status_accept',1)
                        ->where('member_details.statusId',1);
                    });
                }
            }else{
                $list->where('members.groupId','=',1);
                $countstatus=0;
            }

            if(!empty($input['txtprovince'])){
                $countprovince=count($input['txtprovince']);
                $txtprovince = request()->input('txtprovince');

                $list->where('members.groupId','=',1)
                ->where(function ($query1){
                    $query1->whereIn('members.provinceId',request()->input('txtprovince'));
                });

            }else{
                $list->where('members.groupId','=',1);
                $countprovince=0;
            }

            $list1=$list->get();

            $listmember= $list->orderBy('member_details.updated_at','ASC')->paginate(10)->appends($input);

            // $listmember= $list->orderBy('member_details.updated_at','ASC')->get();

            $countmember1=$list1->where('seniorGroupId',1)->count();
            $countmember2=$list1->where('seniorGroupId',2)->count();
            $countmember3=$list1->where('seniorGroupId',3)->count();
            $countmember4=$list1->where('seniorGroupId',4)->count();
            $countmember5=$list1->where('seniorGroupId',5)->count();
            $countmember6=$list1->where('seniorGroupId',6)->count();

            return view('backend.view.snView',compact('listprovince','listgroupsn','liststatus','listmember','countprovince','countstatus','countgroup', 'countmember1', 'countmember2', 'countmember3', 'countmember4', 'countmember5', 'countmember6'));
        } else {
            return redirect('/backend/home');
        }

    }

    public function memView()
    {
        //
    }

    public function orView()
    {
        //
    }

    public function ngoView()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_ngo')) {

            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroupngo=ngoGroup::get();
            $liststatus=Statuses::get();

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
            $list->whereNull('members.confirmed_at');

            $list->where('members.groupId','=',3)
            ->where(function ($query) {
                $query->where('members.status_accept','=',null)
                    ->orWhere('members.status_accept','!=',1);
            });

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

            if(!empty($input['txtstatus'])){
                $countstatus=count($input['txtstatus']);
                $txtstatus = request()->input('txtstatus');

                if(in_array(0, $txtstatus) and in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0 and 1
                    // $key = array_search(0, $txtstatus); //หาคีย์อะเรย์ตำแหน่งที่มีค่า 0
                    // unset($txtstatus[$key]);//ลบอะเรย์ที่มีค่า 0 ออกจากอะเรย์

                    $list->where('members.groupId','=',3)
                    ->where(function ($query3) use($txtstatus){
                        $query3->whereIn('member_details.statusId',$txtstatus);
                    });

                } elseif (in_array(0, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0  ค้นหายังไม่ยืนยัน

                    $list->where('members.groupId','=',3)
                    ->where(function ($query1){
                        $query1->whereNull('members.status_accept')
                        ->orWhere('members.status_accept','=',2)
                        ->orWhere('members.status_accept','=',0);
                    });
                    $list->whereIn('member_details.statusId',[0,1]);

                } elseif (in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 1 ค้นหารอตรวจสอบคุณสมบัติ
                    $list->where('members.groupId','=',3)
                    ->where(function ($query1){
                        $query1->where('members.status_accept',1)
                        ->where('member_details.statusId',1);
                    });
                }
            } else {
                $list->where('members.groupId','=',3);
                $countstatus=0;
            }

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

            // dd($listmember);

            $list1=$list->where('members.ngoGroupId', '=', 1);
            $list2=$list->where('members.ngoGroupId', '=', 2);
            $list3=$list->where('members.ngoGroupId', '=', 3);
            $list4=$list->where('members.ngoGroupId', '=', 4);
            $list5=$list->where('members.ngoGroupId', '=', 5);

            $countmember=$listmember->count();
            $countmember1=$list1->count();
            $countmember2=$list2->count();
            $countmember3=$list3->count();
            $countmember4=$list4->count();
            $countmember5=$list5->count();
        } else {
            $countsection=0;
            $countgroup=0;
            $countprovince=0;
            $countstatus=0;
            $listmember=0;
        }

            return view('backend.view.ngoView',compact('listprovince','listgroupngo','liststatus','listmember','countprovince','countstatus','countgroup','countsection', 'countmember', 'countmember1', 'countmember2', 'countmember3', 'countmember4', 'countmember5'));

        } else {
            return redirect('/backend/home');
        }
    }
}
