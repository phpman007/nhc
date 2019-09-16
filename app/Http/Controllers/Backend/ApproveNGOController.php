<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupNGO;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\election;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\reason;
use App\Model\Backend\Docs;
use App\Model\Backend\ngoSection;
use App\Model\Backend\Logmail;

use Illuminate\Support\Facades\Redirect;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;

class ApproveNGOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            $input = \Request::all();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if($input['txtsection']!="" and $input['txtprovince']=="" and !empty($a)){
                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();

                $listprovince=ngoSection::join('province','ngo_sections.provinceId','=','province.provinceId')
                ->where('section',$input['txtsection'])
                ->whereIn('ngo_sections.section',$a)
                ->select('province.province','ngo_sections.provinceId')
                ->orderBy('ngo_sections.id')
                ->get();

                $listgroupngo="";

            }elseif($input['txtsection']!="" and $input['txtprovince']!="" and !empty($a)){

                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();

                $listprovince=ngoSection::join('province','ngo_sections.provinceId','=','province.provinceId')
                ->where('section',$input['txtsection'])
                ->whereIn('ngo_sections.section',$a)
                ->select('province.province','ngo_sections.provinceId')
                ->orderBy('ngo_sections.id')
                ->get();

                $listgroupngo=GroupNGO::get();
            }else{
                $listgroupngo="";
                $listprovince="";
                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();
            }

            return view('backend.approve.ngoApprove',compact('listprovince','listgroupngo','listsection'));

        } else {
            return redirect('/backend/home');
        }
    }

    public function ngoapprove()
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            $input = \Request::all();

            $a=json_decode(Auth::guard('admin')->user()->sectionControl);

            if(!empty($a)) {

                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();

                $listprovince=Province::join('ngo_sections','province.provinceId','=','ngo_sections.provinceId')
                ->whereIn('ngo_sections.section',$a)
                ->orderBy('ngo_sections.provinceId')
                ->get();
            }else{
                $listsection=ngoSection::whereIn('section',$a)
                ->groupBy('section')
                ->orderBy('section')
                ->get();

                $listprovince="";
                $listsection="";
            }

            $listgroupngo="";

            return view('backend.approve.ngoApprove',compact('listprovince','listgroupngo','listsection'));
        } else {
            return redirect('/backend/home');
        }
    }

    // public function editstatus()
    // {
    //     $a=json_decode(Auth::guard('admin')->user()->sectionControl);

    //     if (Auth::guard('admin')->user()->can('approve_ngo') and !empty($a)) {
    //         $input = \Request::all();
    //         // dd($input);

    //         $list = MemberDetail::find($input['Hid'][0]);
    //         $list->statusId = $input['txtstatuschange'][0];

    //         if($list->update()){
    //             // $this->mail($input['Hid'][0],3);
    //             \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
    //         }else{
    //             \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
    //         }
    //         return back();
    //         // return redirect('/backend/approve/ngoApprove');
    //     } else {
    //         return redirect('/backend/home');
    //     }
    // }

    // public function editnotpass()
    // {
    //     $a=json_decode(Auth::guard('admin')->user()->sectionControl);

    //     if (Auth::guard('admin')->user()->can('approve_ngo') and !empty($a)) {

    //         $input = \Request::all();

    //         $list = MemberDetail::find($input['Hidmember'][0]);
    //         $list->reason = $input['txtreason'][0];
    //         $list->statusId = 4;

    //         if($list->update()){
    //             // $this->mail($input['Hidmember'][0],4);
    //             \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
    //         }else{
    //             \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
    //         }
    //         return back();
    //         // return redirect('/backend/approve/ngoApprove');
    //     } else {
    //         return redirect('/backend/home');
    //     }
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

    public function ngoApproveAll($idprovince, $idgroup, $idsection)
    {
        $a=json_decode(Auth::guard('admin')->user()->sectionControl);

        if (Auth::guard('admin')->user()->can('approve_ngo') and !empty($a)) {
            // dd($a);

            $input = \Request::all();

            // $liststatus = Statuses::get();
            // $idgroup = request()->idgroup;

            $list2 = Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',$idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('members.provinceId','=',$idprovince)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->whereIn('ngo_sections.section',$a)
            ->get();

            $list3 = Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',$idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('members.provinceId','=',$idprovince)
            ->whereIn('member_details.statusId',[3,4])
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->whereIn('ngo_sections.section',$a)
            ->get();


            $list4 = Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',$idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('members.provinceId','=',$idprovince)
            ->whereIn('member_details.statusId',[3,4])
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->whereIn('ngo_sections.section',$a)
            ->get();

            $list=Member::join('member_details','members.id','=','member_details.memberId')
            ->leftJoin('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->leftJoin('users', 'member_details.adminId', '=', 'users.id')
            ->leftJoin('statuses','member_details.statusId','=','statuses.id')
            ->leftJoin('province','members.provinceId','=','province.provinceId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            // ->where('members.groupId','=',3)
            ->where('members.ngoGroupId', $idgroup)
            ->where('members.provinceId','=',$idprovince)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->whereIn('member_details.statusId',[3,4])
            ->where('members.provinceId','=',$idprovince)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->whereIn('ngo_sections.section',$a)
            ->select('province.province','ngo_sections.section','member_details.docId','members.nameTitle','members.firstname','members.lastname','members.personalId','ngo_groups.groupName','member_details.statusId','users.username','member_details.updateStatusTime','member_details.reason','statuses.status');

            if(!empty($input['txtname'])){
                $txtname = $input['txtname'];

                $list->where('members.groupId','=',3)
                ->where(function ($query) use($txtname) {
                    $query->where('members.firstname','like','%'.$txtname.'%')
                        ->orWhere('members.lastname','like','%'.$txtname.'%')
                        ->orWhere('member_details.docId','like','%'.$txtname.'%')
                        ->orWhere('members.username','like','%'.$txtname.'%');
                });

            }else{
                $list->where('members.groupId','=',3);
            }

            $listmember= $list->orderBy('members.id')->paginate(10)->appends($input);

            return view('/backend/approve/ngoApproveAll', compact ('listmember', 'list2', 'list3','list4'));
        } else {
            return redirect('/backend/home');
        }
    }


    public function editfixstatus($idprovince , $idgroup)
    {
        $a=json_decode(Auth::guard('admin')->user()->sectionControl);

        if (Auth::guard('admin')->user()->can('approve_ngo') and !empty($a)) {

            $list=MemberDetail::join('members','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->where('members.groupId','=',3)
            ->where('members.provinceId','=',$idprovince)
            ->where('members.ngoGroupId','=',$idgroup)
            ->whereIn('member_details.statusId',[0,1,2])
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->whereIn('ngo_sections.section',$a)
            ->get();

            if(count($list)==0){
                $b=implode(",", $a);
                $list2=DB::statement("update member_details,members,ngo_sections set member_details.fixStatus=1, member_details.approveDate='".date("Y-m-d H:i:s")."' where members.groupId=3 and members.ngoGroupId=".$idgroup." and members.provinceId=".$idprovince." and members.confirmed_at IS NOT NULL and member_details.memberId=members.id and member_details.statusId in (3,4) and members.provinceId = ngo_sections.provinceId and ngo_sections.section in (".$b.")");
                if($list2){

                    $list3=Member::where('groupId',3)
                    ->where('ngoGroupId',$idgroup)
                    // ->where('status_accept',1)
                    ->where('confirmed_at', '!=', null)
                    ->where('deleted_at',NULL)
                    ->where('provinceId',$idprovince)
                    ->whereHas('detail', function($query2) {
                        $query2->where('fixStatus',1)
                            ->where('deleted_at',NULL)
                            ->where('statusId',3);
                    })
                    ->whereHas('ngo_section', function($query2) use($a) {
                        $query2->whereIn('section',$a);
                    })
                    ->orderBy('firstname')->get();

                    if(count($list3)>0){
                        foreach($list3 as $key => $vallist){
                            $list4 = Member::find($vallist->id);
                            $list4->candidateNumber = $key+1;
                            $list4->update();
                        }
                        if($list4){
                            \Session::flash('success','อนุมัติเรียบร้อยแล้ว');
                            // $group="ผู้แทนองค์กรภาคเอกชน";
                            // $this->mail($list3, $group);
                            // return redirect('backend/approve/pdfNGO/'.$idgroup);
                        }
                    }else{
                        \Session::flash('success','อนุมัติเรียบร้อยแล้ว');
                    }
                }else{
                    \Session::flash('error','ยืนยันการอนุมัติไม่ได้!!!');
                }
            }else{
                \Session::flash('error','กรุณาแก้ไขสถานะให้เรียบร้อยก่อนยืนยันการอนุมัติ!!!');
            }
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function documents()
    {
        $a=json_decode(Auth::guard('admin')->user()->sectionControl);

        if (Auth::guard('admin')->user()->can('approve_ngo') and !empty($a)) {

            $listdocs=Docs::whereIn('section',$a)->get();

            return view('backend.approve.ngoDocuments',compact('listdocs'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function mail($id)
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            $list=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->leftJoin('province','members.provinceId','=','province.provinceId')
            ->where('members.groupId','=',3)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus',1)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.email'
            ,'member_details.statusId','ngo_groups.groupName','member_details.reason','province.province','ngo_sections.section')
            ->get();

            // dd($list);

            $list2=Docs::where('id','=',$id)
            ->first();

            $subject="แจ้งผลประกาศบัญชีรายชื่อผู้แทนองค์กรภาคเอกชนที่มีคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ";
            $groupid=3;

            foreach($list as $val){
                if($val->email!=""){
                    Mail::to("2cs.siriluck@gmail.com")
                    ->send(new approveMail($val->nameTitle, $val->firstname, $val->lastname, $val->statusId, $val->groupName, $val->reason, $list2->pdf_complete, $subject, $groupid, $val->province, $val->section));
                    // $val->email

                    if(Mail::failures()){
                        $data['member_id']      = $val->id;
                        $data['user_id']        = Auth::guard('admin')->user()->id;
                        $data['email']          = $val->email;
                        $data['send_at']        = date('Y-m-d H:i:s');
                        $data['status']         = "f";
                        Logmail::create($data);
                    }else{
                        $data['member_id']      = $val->id;
                        $data['user_id']        = Auth::guard('admin')->user()->id;
                        $data['email']          = $val->email;
                        $data['send_at']        = date('Y-m-d H:i:s');
                        $data['status']         = "s";
                        Logmail::create($data);
                    }
                }
            }

            // Mail::to('julaluckw@gmail.com')
            // ->send(new approveMail("นาง", "จุฬาลักษณ์", "แพร่พาณิชวัฒน์", 3, "กลุ่มขององค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพของตนเองและสมาชิก","", $list2->pdf_complete, $subject, $groupid,"กรุงเทพมหานคร",13));
            // if(Mail::failures()){
            //     $data['member_id']      = 1;
            //     $data['user_id']        = Auth::guard('admin')->user()->id;
            //     $data['email']          = "julaluckw@gmail.com";
            //     $data['send_at']        = date('Y-m-d H:i:s');
            //     $data['status']         = "f";
            //     Logmail::create($data);
            // }else{

            //     $data['member_id']      = 1;
            //     $data['user_id']        = Auth::guard('admin')->user()->id;
            //     $data['email']          = "julaluckw@gmail.com";
            //     $data['send_at']        = date('Y-m-d H:i:s');
            //     $data['status']         = "s";
            //     Logmail::create($data);
            // }

            // Mail::to('Vasit.srithimakul@gmail.com')
            // ->send(new approveMail("Mr.", "Vasit", "Srithimakul", 3, "กลุ่มขององค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพของตนเองและสมาชิก","", $list2->pdf_complete, $subject, $groupid,"กรุงเทพมหานคร",13));
            // if(Mail::failures()){
            //     $data['member_id']      = 1;
            //     $data['user_id']        = Auth::guard('admin')->user()->id;
            //     $data['email']          = "Vasit.srithimakul@gmail.com";
            //     $data['send_at']        = date('Y-m-d H:i:s');
            //     $data['status']         = "f";
            //     Logmail::create($data);
            // }else{
            //     $data['member_id']      = 1;
            //     $data['user_id']        = Auth::guard('admin')->user()->id;
            //     $data['email']          = "Vasit.srithimakul@gmail.com";
            //     $data['send_at']        = date('Y-m-d H:i:s');
            //     $data['status']         = "s";
            //     Logmail::create($data);
            // }

            // Mail::to('zzlosecontrol@gmail.com')
            // ->send(new approveMail("นาย", "สมชัย", "สิมมา", 3, "กลุ่มขององค์กรที่ดำเนินงานเกี่ยวกับการดูแลสุขภาพของตนเองและสมาชิก","", $list2->pdf_complete, $subject, $groupid,"กรุงเทพมหานคร",13));
            // if(Mail::failures()){
            //     $data['member_id']      = 1;
            //     $data['user_id']        = Auth::guard('admin')->user()->id;
            //     $data['email']          = "zzlosecontrol@gmail.com";
            //     $data['send_at']        = date('Y-m-d H:i:s');
            //     $data['status']         = "f";
            //     Logmail::create($data);
            // }else{
            //     $data['member_id']      = 1;
            //     $data['user_id']        = Auth::guard('admin')->user()->id;
            //     $data['email']          = "zzlosecontrol@gmail.com";
            //     $data['send_at']        = date('Y-m-d H:i:s');
            //     $data['status']         = "s";
            //     Logmail::create($data);
            // }

            $list4 = Docs::find($id);
            $list4->statusmail = 1;
            $list4->sendmail_date=date('Y-m-d H:i:s');
            $list4->update();

            \Session::flash('success','ส่งอีเมล์เรียบร้อยแล้ว');

            return back();

        } else {
            return redirect('/backend/home');
        }
    }

    public function genPDF1($id)
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            $list=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')

            ->leftJoin('provinces', function ($join) {
                $join
                ->on('member_details.subDistrictId','=','provinces.district_code')
                ->on('member_details.districtId','=','provinces.amphoe_code')
                ->on('members.provinceId','=','provinces.province_code');
            })
            ->where('members.groupId','=',3)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus',1)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork'
            ,'member_details.workPlaceName','member_details.no','member_details.moo','member_details.soi','member_details.street','member_details.zipCode'
            ,'member_details.tel','member_details.mobile','member_details.nowWorkPlace','member_details.startDate','member_details.endDate','member_details.dateOfBirth'
            ,'member_details.graduated1','member_details.graduated2','member_details.graduated3','member_details.graduated4','member_details.graduated5'
            ,'member_details.faculty1','member_details.faculty2','member_details.faculty3','member_details.faculty4','member_details.faculty5'
            ,'member_details.nowWorkPlace','member_details.pastWork1','member_details.pastWork2','member_details.pastWork3','member_details.pastOrganization1'
            ,'member_details.pastOrganization2','member_details.pastOrganization2','member_details.time1','member_details.time2','member_details.time3','member_details.vision'
            ,'provinces.province','provinces.district','provinces.amphoe','provinces.district_code','provinces.amphoe_code','provinces.province_code')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            // dd($list);

            // $list=Member::where('groupId',3)
            // ->where('status_accept','=',1)
            // ->where('deleted_at',NULL)
            // ->whereHas('detail', function($query2){
            //     $query2->where('fixStatus',1)
            //     ->where('deleted_at',NULL)
            //     ->where('statusId',3);
            //     ->whereHas('ngo_section', function($query3) use($id) {
            //         $query3->where('section',$id);
            //     });
            // })
            // ->whereHas('ngo_section', function($query3) use($id) {
            //     $query3->where('section',$id);
            // })
            // ->orderBy('ngoGroupId')
            // ->orderBy('candidateNumber')
            // ->get();

            // dd($list);

            $pdf = PDF::loadView('/backend/approve/pdfNumber', ['list'=>$list]);
            $path='pdf/approve/approveNGO'.$id.'.pdf';

            $list4 = Docs::find($id);
            $list4->pdf_flipbook = $path;
            $list4->update();

            $pdf->save(public_path($path));
            // return @$pdf->stream('/backend/approve/pdfNGO/'.$id);

            return back();

        } else {
            return redirect('/backend/home');
        }
    }

    public function exportWord($id)
    {

        if (Auth::guard('admin')->user()->can('approve_ngo')) {
            $list1=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',1)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('ngo_groups.groupName','members.ngoGroupId','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            $list2=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',2)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('ngo_groups.groupName','members.ngoGroupId','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            $list3=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',3)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('ngo_groups.groupName','members.ngoGroupId','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            $list4=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',4)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('ngo_groups.groupName','members.ngoGroupId','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            $list5=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('ngo_sections','members.provinceId','=','ngo_sections.provinceId')
            ->join('ngo_groups','members.ngoGroupId','=','ngo_groups.id')
            ->where('members.groupId','=',3)
            ->where('members.ngoGroupId','=',5)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.statusId',3)
            ->where('ngo_sections.section','=',$id)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('ngo_groups.groupName','members.ngoGroupId','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            // dd($list1, $list2, $list3, $list4, $list5);

                $this->genPDF1($id);

                $filename="ngoCandidateAll".$id;

                $group=3;

                if(count($list1)>0){
                    $groupname1=$list1[0]->groupName;
                }else{
                    $groupname1="";
                }

                if(count($list2)>0){
                    $groupname2=$list2[0]->groupName;
                }else{
                    $groupname2="";
                }

                if(count($list3)>0){
                    $groupname3=$list3[0]->groupName;
                }else{
                    $groupname3="";
                }

                if(count($list4)>0){
                    $groupname4=$list4[0]->groupName;
                }else{
                    $groupname4="";
                }

                if(count($list5)>0){
                    $groupname5=$list5[0]->groupName;
                }else{
                    $groupname5="";
                }

                // dd( $groupname4, $groupname5);

                return view('backend.approve.wordNumber',compact('list1','list2','list3','list4','list5','filename','group','groupname1','groupname2','groupname3','groupname4','groupname5'));

        } else {
            return redirect('/backend/home');
        }
    }

    public function uploadPDF(Request $request, $id)
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {

            if($request->hasFile('txtpdf')){
                $name=in_array($request->txtpdf->getClientOriginalExtension(),['pdf']);

                if($name=="true"){
                    $size = \File::size($request->txtpdf);
                    if(($size/1000000)<=20){
                        $filename = "ngoCompletePDF".$id.".pdf";
                        \Request::file('txtpdf')->move(public_path('pdf/doc'), $filename);

                        $list = Docs::find($id);
                        $list->pdf_complete = "pdf/doc/ngoCompletePDF".$id.".pdf";
                        $list->statusmail = NULL;
                        $list->sendmail_date=NULL;
                        $list->update();

                        \Session::flash('success','อัพโหลดไฟล์ pdf เรียบร้อยแล้ว');
                    }else{
                        \Session::flash('warning','ไฟล์ pdf ต้องมีขนาดไม่เกิน 20MB');
                    }
                }else{
                    \Session::flash('warning','กรุณาเลือก ไฟล์นามสกุล pdf เท่านั้น');
                }
            }else{
                \Session::flash('warning','กรุณาเลือกไฟล์ที่ต้องการอัพโหลด!!!');
            }
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function delcompletePDF($id)
    {
        if (Auth::guard('admin')->user()->can('approve_ngo')) {
            $list = Docs::find($id);
            $list->pdf_complete = NULL;

            if($list->update()){
                \Session::flash('success','ลบไฟล์ pdf เรียบร้อยแล้ว');
            }else{
                \Session::flash('error','ลบไฟล์ไม่ได้!!!');
            }
            return back();

        } else {
            return redirect('/backend/home');
        }
    }

}
