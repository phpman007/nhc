<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Model\Backend\Log;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $input = \Request::all();
        $list="";

        if(request()->input('txtdate1') !="" and request()->input('txtdate2') != ""){
            $date1=Carbon::createFromFormat('d/m/Y', request()->input('txtdate1'));
            $date2=Carbon::createFromFormat('d/m/Y', request()->input('txtdate2'));
            if($date1 <= $date2 ){
                $list=Log::where('dt','>=',$date1)->where('dt','<=',$date2)->orderBy('dt','DESC')->paginate(20)->appends($input);

            }else{
                \Session::flash('error','กรุณาระบุตั้งแต่วันที่ และถึงวันที่ ให้ถูกต้อง!!!');
            }
        }
        return view('backend/log/index',compact('list'));
    }

    public function logSN1(Request $request)
    {
        $input = \Request::all();
        $list1=Log::where('action','=','SN1');
        $list2=Log::where('action','=','SN2');
        $list3=Log::where('action','=','SN3');
        $list4=Log::where('action','=','SN4');
        $list5=Log::where('action','=','SN5');
        $list6=Log::where('action','=','SN6');
        $list7=Log::where('action','=','SNcomplete');


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

                $list7->where('dt','>=',$date1);
                $list7->where('dt','<=',$date2);
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
        $list7=$list7->count();
        return view('backend/log/logSN1',compact('list1','list2','list3','list4','list5','list6','list7'));
    }

    public function logSN2(Request $request , $id)
    {
        $input = \Request::all();

        if($id==7){
            $list=Log::where('action','=','SNcomplete');
        }else{
            $list=Log::where('action','=','SN'.$id);
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

        return view('backend/log/logSN2',compact('listlog', 'id'));
    }

    public function logSN3(Request $request , $email, $id)
    {
        $input = \Request::all();

        $list=Log::where('members','=',$email)->whereIn('action',['SN1','SN2','SN3','SN4','SN5','SN6','SNcomplete']);

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

        return view('backend/log/logSN3',compact('listlog', 'email', 'id'));
    }
}
