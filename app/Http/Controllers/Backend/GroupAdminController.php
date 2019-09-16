<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role as GroupAdmin;
use Spatie\Permission\Models\Permission;
class GroupAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupAdmin $groupadmin)
    {
        return view('backend.groupadmin.index', [
             'items'    => $groupadmin->paginate()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.groupadmin.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GroupAdmin $groupadmin)
    {
          $this->validate($request, [
                'name'  => 'required'
          ], ['name.required' => 'กรุณากรอกข้อมูลชื่อกลุ่ม']);

        $groupadmin = $groupadmin->create(['name' => $request->name, 'guard_name' => 'admin']);

        // $permission = Permission::create(['name' => 'edit articles']);
        foreach ($request->permission as $key => $value) {
              // $permission = Permission::create(['name' => $value, 'guard_name' => 'admin']);
              $permission =  Permission::where('name', $value)->first();
              if(empty($permission)) {
                    $permission = Permission::create(['name' => $value, 'guard_name' => 'admin']);
              }
              $permission->assignRole($groupadmin);
        }


        return redirect()->route('backend.groupadmin.index')->with("info", 'สร้างข้อมูลใหม่เรียบร้อยแล้ว');
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
    public function edit($id, GroupAdmin $groupadmin)
    {
          // dd($groupadmin->find($id));
              return view('backend.groupadmin.form', [
                    'item'    => $groupadmin->with('permissions')->find($id)
              ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, GroupAdmin $groupadmin)
    {
          $this->validate($request, [
               'name'  => 'required'
         ], ['name.required' => 'กรุณากรอกข้อมูลชื่อกลุ่ม']);


         // dd($request->all());
       $groupadmin = $groupadmin->find($id);
       $groupadmin->update(['name' => $request->name]);
       \DB::table('role_has_permissions')->where('role_id', $id)->delete();
       foreach ($request->permission as $key => $value) {

             $permission =  Permission::where('name', $value)->first();

             if(empty($permission)) {
                   $permission = Permission::create(['name' => $value, 'guard_name' => 'admin']);
             }
             $permission->assignRole($groupadmin);
       }
       return redirect()->route('backend.groupadmin.index')->with("info", 'แก้ไขข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, GroupAdmin $groupadmin)
    {
          $groupadmin = $groupadmin->find($id)->delete();

        return redirect()->route('backend.groupadmin.index')->with("info", 'ลบข้อมูลเรียบร้อยแล้ว');
    }
}
