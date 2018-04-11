<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\ProductsModel;
use App\Http\Models\CategoriesModel;
use App\Http\Models\UsersModel;
use Illuminate\Http\Request;

class PermissionController extends Controller {

	public function index() {
		$pers = UsersModel::get_permission();
		return response()->json($pers);
	}

	public function show($id) {
		$per = UsersModel::get_permission_by_id($id);
		return response()->json($per);
	}

	public function store(Request $request) {
		$data = [
			'name' => $request->name
		];

		if(UsersModel::insert_permission($data)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
	}

	public function update(Request $request) {
		$id = $request->id;
		$per = UsersModel::get_permission_by_id($id);
		$name = $per->name;
		if($request->name !=null) {
			$name = $request->name;
		}

		$data = [
			'name'=> $name
		];

		if(UsersModel::update_permission($id,$data)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
	}

	public function destroy($id) {
		if(UsersModel::delete_permission($id)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
	}
}