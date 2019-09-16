<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Model\Backend\Log;

class LogNGOController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function logNGO1(Request $request)
    {
        $input = \Request::all();
        $list1=Log::where('action','=','NGO1');
        $list2=Log::where('action','=','NGO2');
        $list3=Log::where('action','=','NGO3');
        $list4=Log::where('action','=','NGO4');
        $list5=Log::where('action','=','NGO5');
        $list6=Log::where('action','=','NGOcomplete');

        $listRegis1=Log::where('action','=','NGORegis1');
        $listRegis2=Log::where('action','=','NGORegis2');
        $listRegis3=Log::where('action','=','NGORegis3');
        $listRegis4=Log::where('action','=','NGORegis4');
        $listRegis5=Log::where('action','=','NGORegiscomplete');


        if(request()->input('txtdate1') !="" and request()->input('txtdate2') != ""){
            $date1=Carbon::createFromFormat('d/m/Y', request()->input('txtdate1'));
            $date2=Carbon::createFromFormat('d/m/Y', request()->input('txtdate2'));
            if($date1 <= $date2 ){
                $list1->where('dt','>=',$date1);
                $list1->where('dt','<=',$date2);

                $list2->where('dt','>=',$date1);
                $list2->where('dt','<=',$date2);

                $list3->where('dt','>=',$date1);
                $list3->where('dt','<=',$date2);

                $list4->where('dt','>=',$date1);
                $list4->where('dt','<=',$date2);

                $list5->where('dt','>=',$date1);
                $list5->where('dt','<=',$date2);

                $list6->where('dt','>=',$date1);
                $list6->where('dt','<=',$date2);

                $listRegis1->where('dt','>=',$date1);
                $listRegis1->where('dt','<=',$date2);

                $listRegis2->where('dt','>=',$date1);
                $listRegis2->where('dt','<=',$date2);

                $listRegis3->where('dt','>=',$date1);
                $listRegis3->where('dt','<=',$date2);

                $listRegis4->where('dt','>=',$date1);
                $listRegis4->where('dt','<=',$date2);

                $listRegis5->where('dt','>=',$date1);
                $listRegis5->where('dt','<=',$date2);
            }else{
                \Session::flash('error','กรุณาระบุตั้งแต่วันที่ และถึงวันที่ ให้ถูกต้อง!!!');
            }
        }
        $list1=$list1->count();
        $list2=$list2->count();
        $list3=$list3->count();
        $list4=$list4->count();
        $list5=$list5->count();
        $list6=$list6->count();

        $listRegis1=$listRegis1->count();
        $listRegis2=$listRegis2->count();
        $listRegis3=$listRegis3->count();
        $listRegis4=$listRegis4->count();
        $listRegis5=$listRegis5->count();


        return view('backend/log/logNGO1',compact('list1','list2','list3','list4','list5','list6','listRegis1','listRegis2','listRegis3','listRegis4','listRegis5'));
    }

    public function logNGO2(Request $request , $id)
    {
        $input = \Request::all();

        if($id==6){
            $list=Log::where('action','=','NGOcomplete');
        }else{
            $list=Log::where('action','=','NGO'.$id);
        }

        if(request()->input('txtdate1') !="" and request()->input('txtdate2') != ""){
            $date1=Carbon::createFromFormat('d/m/Y', request()->input('txtdate1'));
            $date2=Carbon::createFromFormat('d/m/Y', request()->input('txtdate2'));
            if($date1 <= $date2 ){
                $list->where('dt','>=',$date1);
                $list->where('dt','<=',$date2);
            }else{
                \Session::flash('error','กรุณาระบุตั้งแต่วันที่ และถึงวันที่ ให้ถูกต้อง!!!');
            }
        }

        if(request()->input('txtname') != ""){
            $list->where('members','like','%'.$request->input('txtname').'%');
        }

        $listlog=$list->orderBy('dt','DESC')->paginate(20)->appends($input);

        return view('backend/log/logNGO2' ,compact('listlog','id'));
    }

    public function logNGO3(Request $request ,$email, $id)
    {
        $input = \Request::all();

        $list=Log::where('members','=',$email)->whereIn('action',['NGO1','NGO2','NGO3','NGO4','NGO5','NGOcomplete']);

        if(request()->input('txtdate1') !="" and request()->input('txtdate2') != ""){
            $date1=Carbon::createFromFormat('d/m/Y', request()->input('txtdate1'));
            $date2=Carbon::createFromFormat('d/m/Y', request()->input('txtdate2'));
            if($date1 <= $date2 ){
                $list->where('dt','>=',$date1);
                $list->where('dt','<=',$date2);
            }else{
                \Session::flash('error','กรุณาระบุตั้งแต่วันที่ และถึงวันที่ ให้ถูกต้อง!!!');
            }
        }

        if(request()->input('txtname') != ""){
            $list->where('members','like','%'.$request->input('txtname').'%');
        }

        $listlog=$list->orderBy('dt','DESC')->paginate(20)->appends($input);

        return view('backend/log/logNGO3',compact('listlog', 'email', 'id'));
    }

    public function logNGOregis2(Request $request , $id)
    {
        $input = \Request::all();

        if($id==5){
            $list=Log::where('action','=','NGORegiscomplete');
        }else{
            $list=Log::where('action','=','NGORegis'.$id);
        }

        if(request()->input('txtdate1') !="" and request()->input('txtdate2') != ""){
            $date1=Carbon::createFromFormat('d/m/Y', request()->input('txtdate1'));
            $date2=Carbon::createFromFormat('d/m/Y', request()->input('txtdate2'));
            if($date1 <= $date2 ){
                $list->where('dt','>=',$date1);
                $list->where('dt','<=',$date2);
            }else{
                \Session::flash('error','กรุณาระบุตั้งแต่วันที่ และถึงวันที่ ให้ถูกต้อง!!!');
            }
        }

        if(request()->input('txtname') != ""){
            $list->where('members','like','%'.$request->input('txtname').'%');
        }

        $listlogregis=$list->orderBy('dt','DESC')->paginate(20)->appends($input);

        return view('backend/log/logNGOregis2',compact('listlogregis','id'));
    }

    public function logNGOregis3(Request $request , $email, $id)
    {
        $input = \Request::all();

        $list=Log::where('members','=',$email)->whereIn('action',['NGORegis1','NGORegis2','NGORegis3','NGORegis4','NGORegis5','NGORegiscomplete']);

        if(request()->input('txtdate1') !="" and request()->input('txtdate2') != ""){
            $date1=Carbon::createFromFormat('d/m/Y', request()->input('txtdate1'));
            $date2=Carbon::createFromFormat('d/m/Y', request()->input('txtdate2'));
            if($date1 <= $date2 ){
                $list->where('dt','>=',$date1);
                $list->where('dt','<=',$date2);
            }else{
                \Session::flash('error','กรุณาระบุตั้งแต่วันที่ และถึงวันที่ ให้ถูกต้อง!!!');
            }
        }

        if(request()->input('txtname') != ""){
            $list->where('members','like','%'.$request->input('txtname').'%');
        }

        $listlogregis=$list->orderBy('dt','DESC')->paginate(20)->appends($input);

        return view('backend/log/logNGOregis3',compact('listlogregis', 'email', 'id'));
    }
}
