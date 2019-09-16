<?php

namespace App\Http\Controllers\Backend;

use App\Model\Backend\Modules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;
class ModuleController extends Controller
{
	protected $path 		= "backend.module.";
	protected $titlePage 	= "ระบบจัดการโมดุล";
	protected $descPage 	= "ระบบจัดการโมดุล";
	protected $version 	= "v1.0";




	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index(Modules $items)
	{
		$items = $items->paginate();

		return $this->view('index', ['items' => $items]);
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create()
	{

		return $this->view('form');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request, Modules $item)
	{
		$module_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', ucfirst(\Str::studly(\Str::snake($request->module_name))));

		$dataSet = $request->all();
		$dataSet['module_name'] 	= $module_name;

		Artisan::call("module:make {$module_name}");

		$item->create($dataSet);

		$moduleConfigPath = base_path('Modules/'. $module_name .'/module.json');

		$file 		= fopen($moduleConfigPath, "r");
		$contents 		= fread($file, filesize($moduleConfigPath));
		fclose($file);

		// Module
		$config 		= json_decode($contents);
		$config->active 	= (int)$request->status;
		$config->description = $request->detail;

		// save config
		$newConfig		= json_encode($config,JSON_PRETTY_PRINT);
		$file 		= fopen($moduleConfigPath, "w+");
		fwrite($file, $newConfig);
		fclose($file);

		return redirect('backend/module')->with('info', 'เพิ่มรายการข้อมูลเรียบร้อยแล้ว');
	}

	/**
	* Display the specified resource.
	*
	* @param  \App\Model\Backend\Modules  $modules
	* @return \Illuminate\Http\Response
	*/
	public function show(Modules $modules)
	{
		//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  \App\Model\Backend\Modules  $modules
	* @return \Illuminate\Http\Response
	*/
	public function edit(Modules $modules)
	{
		//
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  \App\Model\Backend\Modules  $modules
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, Modules $modules)
	{
		//
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  \App\Model\Backend\Modules  $modules
	* @return \Illuminate\Http\Response
	*/
	public function destroy(Modules $modules, $id)
	{
		$module = $modules->find($id);
		$this->deleteDirectory(base_path('/Modules/'. $module->module_name));

		$module->delete();

		return redirect('backend/module')->with('info', 'เพิ่มรายการข้อมูลเรียบร้อยแล้ว');
	}

	protected function deleteDirectory($dir) {
		if (!file_exists($dir)) {
			return true;
		}

		if (!is_dir($dir)) {
			return unlink($dir);
		}

		foreach (scandir($dir) as $item) {
			if ($item == '.' || $item == '..') {
				continue;
			}

			if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
				return false;
			}

		}

		return rmdir($dir);
	}
}
