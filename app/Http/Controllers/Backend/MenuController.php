<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Admin as User;
use App\Model\Backend\Menu;
use Auth,Session,Redirect;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        parent::__construct();
        $this->user = Auth::guard('admin');
    }
    public function index()
    {
        $items['main'] = Menu::where('menu_type','main')->where('menu_parent',0)->orderBy('menu_sort','asc')->get();
        $items['sidebar'] = Menu::where('menu_type','sidebar')->where('menu_parent',0)->orderBy('menu_sort','asc')->get();
        $items['all'] = Menu::all();
     return view('backend.menu.index')->with(['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $inputs['created_by'] = $this->user->user()->id;
        $menu = new Menu;
        $menu->create($inputs);
        return  Redirect::route('backend.menu.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resort(request $request)
    {
        $inputs = $request->all();
        $loopChangeStatusSidebar = $this->loopChange(json_decode($inputs['sidebar']),'sidebar');
        $loopChangeStatusMain = $this->loopChange(json_decode($inputs['main']),'main');
        return  Redirect::route('backend.menu.home');
    }
    public function loopChange($datas,$type,$parent = null)
    {
        if($datas != null){
            foreach($datas as $key=> $data){

                $menu = Menu::find($data->id);
                $menu->menu_sort = ($key+1);
                $menu->menu_type = $type;
                if($parent != null){
                    $menu->menu_parent = $parent;
                }else{
                    $menu->menu_parent = 0;
                }
                $menu->save();
                if(isset($data->children)){

                    $this->loopChange($data->children,$type,$data->id);
                }

            }
        }

        return true;
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
    public function update(Request $request)
    {
        $inputs = $request->except('id','_token');
        $update = Menu::find($request->input('id'));
        $update->update($inputs);
        return  Redirect::route('backend.menu.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if($this->user->user() != null){
            Menu::destroy($id);
        }
       return response()->json(1, 200);
    }
}
