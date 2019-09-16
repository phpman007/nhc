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
use Illuminate\Support\Facades\Auth;

class orCheckController extends Controller
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
                $list=Member::where('groupId','=',2)->where('candidateStatus','=',1)->where('status_accept','=',1);
                $countgroup=0;
                $countprovince=0;
                $countstatus=0;
            }else{
                $list=Member::where('groupId','=',2)->where('status_accept','=',1);

                if(!empty($input['txtname'])){
                    $txtname = request()->input('txtname');

                    $list->where('candidateStatus','=',1)
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
                        $list->where('candidateStatus','=',1)
                        ->where(function ($query) {
                            $query->where('organizationGroupId','=',\Request::get('txtgroup')[0]);
                        });
                    }elseif($countgroup==2){
                        $list->where('candidateStatus','=',1)
                        ->where(function ($query) {
                            $query->where('organizationGroupId','=',\Request::get('txtgroup')[0])
                                ->orWhere('organizationGroupId','=',\Request::get('txtgroup')[1]);
                        });
                    }elseif($countgroup==3){
                        $list->where('candidateStatus','=',1)
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
                        $list->where('candidateStatus','=',1)
                        ->whereHas('detail', function ($query) use($txtstatus) {
                            $query->where('statusId','=',$txtstatus[0]);
                        });
                    }elseif($countstatus==2){
                        $list->where('candidateStatus','=',1)
                        ->whereHas('detail', function ($query) use($txtstatus) {
                            $query->where('statusId','=',$txtstatus[0])
                                ->orWhere('statusId','=',$txtstatus[1]);
                        });
                    }elseif($countstatus==3){
                        $list->where('candidateStatus','=',1)
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
                        $list->where('candidateStatus','=',1)
                        ->whereHas('detail', function ($query) use($txtprovince) {
                            $query->where('provinceId','=',$txtprovince[0]);
                        });
                    }elseif($countprovince==2){
                        $list->where('candidateStatus','=',1)
                        ->whereHas('detail', function ($query) use($txtprovince) {
                            $query->where('provinceId','=',$txtprovince[0])
                                ->OrWhere('provinceId','=',$txtprovince[1]);
                        });
                    }elseif($countprovince==3){
                        $list->where('candidateStatus','=',1)
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

            $listmember= $list->orderBy('id')->paginate(10);

            return view('/backend/check/orCheck',compact('listprovince','listgroupor','liststatus','listmember','countprovince','countstatus','countgroup'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function exportExcel(){
        $input = \Request::all();

        if(empty($input['Hname']) and empty($input['Hgroup']) and empty($input['Hstatus']) and empty($input['Hprovince'])){
            $list=Member::where('groupId','=',2)->where('candidateStatus','=',1)->where('status_accept','=',1);

            $countgroup=0;
            $countprovince=0;
            $countstatus=0;
        }else{
            $list=Member::where('groupId','=',2)->where('status_accept','=',1);

            if(!empty($input['Hname'])){
                $txtname = request()->input('Hname');

                $list->where('candidateStatus','=',1)
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
                    $list->where('candidateStatus','=',1)
                    ->where(function ($query) {
                        $query->where('organizationGroupId','=',\Request::get('Hgroup')[0]);
                    });
                }elseif($countgroup==2){
                    $list->where('candidateStatus','=',1)
                    ->where(function ($query) {
                        $query->where('organizationGroupId','=',\Request::get('Hgroup')[0])
                            ->orWhere('organizationGroupId','=',\Request::get('Hgroup')[1]);
                    });
                }elseif($countgroup==3){
                    $list->where('candidateStatus','=',1)
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
                    $list->where('candidateStatus','=',1)
                    ->whereHas('detail', function ($query) use($txtstatus) {
                        $query->where('statusId','=',$txtstatus[0]);
                    });
                }elseif($countstatus==2){
                    $list->where('candidateStatus','=',1)
                    ->whereHas('detail', function ($query) use($txtstatus) {
                        $query->where('statusId','=',$txtstatus[0])
                            ->orWhere('statusId','=',$txtstatus[1]);
                    });
                }elseif($countstatus==3){
                    $list->where('candidateStatus','=',1)
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
                    $list->where('candidateStatus','=',1)
                    ->whereHas('detail', function ($query) use($txtprovince) {
                        $query->where('provinceId','=',$txtprovince[0]);
                    });
                }elseif($countprovince==2){
                    $list->where('candidateStatus','=',1)
                    ->whereHas('detail', function ($query) use($txtprovince) {
                        $query->where('provinceId','=',$txtprovince[0])
                            ->OrWhere('provinceId','=',$txtprovince[1]);
                    });
                }elseif($countprovince==3){
                    $list->where('candidateStatus','=',1)
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

        return view('/backend/check/orCheckExcel',compact('listmember'));

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
        // ->join('province','member_details.provinceId','=','province.provinceId')
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
}
