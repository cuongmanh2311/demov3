<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\ProductsModel;
use App\Http\Models\CategoriesModel;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

	public function  index() {
		$cates = CategoriesModel::get_cates();
		return response()->json($cates);
	}

	public function show($id) {
		$cate = CategoriesModel::get_cates_by_id($id);
		return response()->json($cate);
	}
	
	public function store(Request $request) {

		$parent_id = 0;
		if($request->parent_id != null) {
			$parent_id = $request->parent_id;
		}
		$data = [
			'name' => $request->name,
			'parent_id' => $parent_id,
			'description' => $request->description
		];

		if(CategoriesModel::insert_cates($data)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
	}

	public function update(Request $request) {

		$id = $request->id;
		$cate = CategoriesModel::get_cates_by_id($id);
		$name = $cate->name;
		$parent_id = $cate->parent_id;
		$description = $cate->description;

		if($request->name != null) {
			$name = $request->name;
		}
		if($request->description != null) {
			$description = $request->description;
		}
		if($request->parent_id != null) {
			$parent_id = $request->parent_id;
		}

		$data = [
			'name' => $name,
			'parent_id' => $parent_id,
			'description' => $description
		];

		if(CategoriesModel::update_cates($id,$data)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
		
	}

	public function destroy($id) {
		if(CategoriesModel::delete_cates($id)) {
			return response()->json(['status'=>true]);
		} 
		return response()->json(['status'=>false]);
	}

	public function search() {


	}
	//truyen vao id de tim ra cac con cua no
	public function parent() {
		$id= $_GET['id'];
		$cate = CategoriesModel::get_cates_by_parentid($id);

		return response()->json($cate);
	}
}

 