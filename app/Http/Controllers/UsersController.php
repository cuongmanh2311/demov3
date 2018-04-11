<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\ProductsModel;
use App\Http\Models\CategoriesModel;
use App\Http\Models\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller {

	public function index() {
		$users = UsersModel::get_users();
		return response()->json($users);
	}

	public function show($id) {
		$user = UsersModel::get_users_by_id($id);
		return response()->json($user);
	}

	public function login(Request $request) {
		$email = $request->email;
		$password = $request->password;

		$user = UsersModel::login($email,$password);
		if(!$user) {
			return response()->json(['status'=>false]);
		}
		return response()->json($user);
	}

	public function store(Request $request) {
		$data = [
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password,
			'role' => $request->role
		];
		$id = UsersModel::insert_users($data);
		if($id!=null) {
			return response()->json(['status'=>true,'id'=>$id]);
		}
		return response()->json(['status'=>false]);
	}

	public function update(Request $request) {
		$id = $request->id;
		$user = UsersModel::get_users_by_id($id);
		$name = $user->name;
		$email = $user->email;
		$password = $user->password;
		$role = $user->role;

		if($request->name != null) {
			$name = $request->name;
		}
		if($request->email != null) {
			$email = $request->email;
		}
		if($request->password != null) {
			$password = $request->password;
		}
		if($request->role !=null ){
			$role = $request->role;
		}

		$data =[
			'name' => $name,
			'email' => $email,
			'password' => $password,
			'role' => $role
		];

		if(UsersModel::update_users($id,$data)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
	}

	public function destroy($id) {
		if(UsersModel::delete_users($id)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>false]);
	}

	public function search(Request $request) {
		$name = $request->name;

		$users = UsersModel::search_users($name);
		return response()->json($users);
	}

	public function permission (Request $request) {
		$role  = $_GET['role'];
		return response()->json(UsersModel::get_permission_by_roleid($role));
	}

	public function user_permission(Request $request) {
		$role = $_GET['role'];
		$users = UsersModel::get_users_by_role($role);
		return response()->json($users);
	}



}