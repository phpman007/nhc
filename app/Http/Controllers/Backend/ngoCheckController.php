<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\ngoGroup;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use Illuminate\Support\Facades\Redirect;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\ngoSection;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ngoCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_ngo')) {

            $input = \Request::all();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty($a)) {
                $listgroupngo=ngoGroup::get();
                $liststatus=Statuses::get();

                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();
                $countsection=count($listsection);

                if(!empty($input['txtsection'])){
                    $listprovince=Province::join('ngo_sections','province.provinceId','=','ngo_sections.provinceId');
                    $listprovince->whereIn('ngo_sections.section',$input['txtsection']);
                    $listprovince->select('province.provinceId','province.province');
                    $listprovince=$listprovince->orderBy('province')->get();
                }else{
                    $listprovince="";
                }

                $list=Member::leftJoin('member_details','member_details.memberId','=','members.id');
                $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
                $list->leftJoin('province','members.provinceId','=','province.provinceId');
                $list->leftJoin('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
                $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
                $list->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId');
                $list->select('ngo_sections.section','members.ngoGroupId','members.status_accept','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','province.provinceId','province.province','ngo_groups.groupName','users.username', 'users.sectionControl', 'member_details.updateStatusTime', 'members.confirmed_at', 'members.updated_at');


                // $list->where('members.groupId', '=', 3);
                $list->where('members.status_accept', '=', 1)
                ->where(function ($query) {
                    $query->where('members.deleted_at','=',null)
                    ->where('member_details.deleted_at','=',null);
                });

                $list->whereIn('ngo_sections.section',$a);

                // $check = json_decode(Auth::guard('admin')->user()->sectionControl)
                // dd(Auth::guard('admin')->user()->sectionControl);

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

                if(!empty($input['txtstatus'])){
                    $countstatus=count($input['txtstatus']);
                    $txtstatus = request()->input('txtstatus');

                    $list->where('members.groupId','=',3)
                    ->where(function ($query){
                        $query->whereIn('member_details.statusId',\Request::get('txtstatus'));
                    });
                    $list->where('members.status_accept', '!=', null);
                    $list->where('members.confirmed_at', '!=', null);
                    $list->where('member_details.statusId','!=',2);
                    $list->where('member_details.docId','!=',null);

                    // if(in_array(0, $txtstatus) and in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0 and 1
                    //     // $key = array_search(0, $txtstatus); //หาคีย์อะเรย์ตำแหน่งที่มีค่า 0
                    //     // unset($txtstatus[$key]);//ลบอะเรย์ที่มีค่า 0 ออกจากอะเรย์

                    //     $list->where('members.groupId','=',3)
                    //     ->where(function ($query3) use($txtstatus){
                    //         $query3->whereIn('member_details.statusId',$txtstatus);
                    //     });

                    // }elseif(in_array(0, $txtstatus)) {//ถ้าในอะเรย์มีค่า 0  ค้นหายังไม่ยืนยัน

                    //     $list->where('members.groupId','=',3)
                    //     ->where(function ($query1){
                    //         $query1->whereNull('members.status_accept')
                    //         ->orWhere('members.status_accept','=',2)
                    //         ->orWhere('members.status_accept','=',0);
                    //     });
                    //     $list->whereIn('member_details.statusId',[0,1]);

                    // }elseif(in_array(1, $txtstatus)) {//ถ้าในอะเรย์มีค่า 1 ค้นหารอตรวจสอบคุณสมบัติ
                    //     $list->where('members.groupId','=',3)
                    //     ->where(function ($query1){
                    //         $query1->where('members.status_accept',1)
                    //         ->where('member_details.statusId',1);
                    //     });
                    // }
                }else{
                    $list->where('members.groupId','=',3);
                    $countstatus=0;
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

                $listmember= $list->orderBy('member_details.updated_at','ASC')->paginate(10)->appends($input);

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
                $listsection="";
                $listmember="";
                $listprovince="";
                $listgroupngo="";
                $liststatus="";

                $countmember=0;
                $countmember1=0;
                $countmember2=0;
                $countmember3=0;
                $countmember4=0;
                $countmember5=0;
            }

            return view('backend.check.ngoCheck',compact('listprovince','listgroupngo','liststatus','listmember','listsection','countprovince','countstatus','countgroup','countsection', 'countmember', 'countmember1', 'countmember2', 'countmember3', 'countmember4', 'countmember5'));

        } else {
            return redirect('/backend/home');
        }
    }

    public function exportExcel()
    {
        if (Auth::guard('admin')->user()->can('check_evidence_ngo')) {
            $input = \Request::all();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty($a)) {

                $list=Member::leftJoin('member_details','member_details.memberId','=','members.id');
                $list->leftJoin('statuses','member_details.statusId','=','statuses.id');
                $list->leftJoin('province','members.provinceId','=','province.provinceId');
                $list->leftJoin('ngo_groups', 'members.ngoGroupId', '=', 'ngo_groups.id');
                $list->leftJoin('users', 'member_details.adminId', '=', 'users.id');
                $list->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId');
                $list->select('ngo_sections.section','members.ngoGroupId','members.status_accept','member_details.fixStatus','members.personalId','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','member_details.statusId','statuses.status','member_details.provinceId','province.province','ngo_groups.groupName','users.username', 'users.sectionControl', 'member_details.updateStatusTime', 'members.confirmed_at', 'members.updated_at');

                $list->where('members.status_accept', '=', 1)
                ->where(function ($query) {
                    $query->where('members.deleted_at','=',null)
                    ->where('member_details.deleted_at','=',null);
                });
                $list->whereIn('ngo_sections.section',$a);

                if(!empty($input['Hname'])){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query) {
                        $query->where('members.firstname','like','%'.\Request::get('Hname').'%')
                            ->orWhere('members.lastname','like','%'.\Request::get('Hname').'%')
                            ->orWhere('member_details.docId','like','%'.\Request::get('Hname').'%')
                            ->orWhere('members.username','like','%'.\Request::get('Hname').'%');
                    });

                }else{
                    $list->where('members.groupId','=',3);
                }

                if(!empty($input['Hgroup'])){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query){
                        $query->whereIn('members.ngoGroupId',\Request::get('Hgroup'));
                    });

                }else{
                    $list->where('members.groupId','=',3);
                    $countgroup=0;
                }

                if(!empty($input['Hstatus'])){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query){
                        $query->whereIn('member_details.statusId',\Request::get('Hstatus'));
                    });

                }else{
                    $list->where('members.groupId','=',3);

                    $countstatus=0;
                }

                if(!empty($input['Hprovince'])){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query1){
                        $query1->whereIn('members.provinceId',request()->input('Hprovince'));
                    });

                }else{
                    $list->where('members.groupId','=',3);

                    $countprovince=0;
                }

                if(!empty($input['Hsection'])){
                    $list->where('members.groupId','=',3)
                    ->where(function ($query1){
                        $query1->whereIn('ngo_sections.section',request()->input('Hsection'));
                    });

                }else{
                    $list->where('members.groupId','=',3);

                    $countsection=0;
                }

                $listmember= $list->orderBy('member_details.updated_at','ASC')->get();
            }
            return view('/backend/check/ngoCheckExcel',compact('listmember'));

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
    // public function edit($id)
    // {
    //     $a=json_decode(Auth::guard('admin')->user()->sectionControl);

    //     if (Auth::guard('admin')->user()->can('check_evidence_ngo') and !empty($a)) {
    //         $list1=MemberDetail::where('id','=',$id)->whereNull('adminId')->first();

    //         if($list1!=NULL){
    //             $adminId=Auth::guard('admin')->user()->id;

    //             $list2=MemberDetail::where('memberId','=',$id)
    //             ->update(['adminId'=>$adminId]);

    //             // if($list2->update()){
    //             //     \Session::flash('success');
    //             // }else{
    //             //     \Session::flash('error');
    //             // }
    //         //}else{
    //             // \Session::flash('error');
    //         }
    //         return back();
    //     } else {
    //         return redirect('/backend/home');
    //     }
    // }

    public function editstatus()//แก้ไขกรณีสถานะ ผ่าน ,รอ ,ระหว่าง
    {
        $a=json_decode(Auth::guard('admin')->user()->sectionControl);



        if (Auth::guard('admin')->user()->can('check_evidence_ngo') and !empty($a)) {
            // dd($a);
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

                $list=Member::join('member_details','member_details.memberId','=','members.id')
                ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                ->where('member_details.memberId','=',$input['Hid'][0])
                ->whereIn('ngo_sections.section',$a)
                ->update(['reason'=>NULL,'statusId'=>$input['txtstatuschange'][0], 'adminId'=>Auth::guard('admin')->user()->id, 'updateStatusTime'=>date('Y-m-d H:i:s')]);

            }else{//สถานะรอตรวจสอบ สถานะระหว่างตรวจสอบ
                $list=Member::join('member_details','member_details.memberId','=','members.id')
                ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
                ->where('member_details.memberId','=',$input['Hid'][0])
                ->whereIn('ngo_sections.section',$a)
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
        $a=json_decode(Auth::guard('admin')->user()->sectionControl);

        if (Auth::guard('admin')->user()->can('check_evidence_ngo') and !empty($a)) {
            $input = \Request::all();

            $list=Member::join('member_details','member_details.memberId','=','members.id')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->where('member_details.memberId','=',$input['Hidmember'][0])
            ->whereIn('ngo_sections.section',$a)
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
