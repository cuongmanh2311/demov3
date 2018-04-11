<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\ProductsModel;
use App\Http\Models\CategoriesModel;
use App\Http\Models\UsersModel;
use App\Http\Models\RentModel;
use Illuminate\Http\Request;

class RentController extends Controller {		

	public function index(Request $request) {
		$rent = RentModel::get_rent();
		return response()->json($rent);
	}

	public function show($id) {

	}

	public function store(Request $request) {
		$user_id = $request->user_id;
		$pro_id = $request->pro_id;
		$data = [
			'user_id' => $user_id,
			'pro_id' => $pro_id
		];
		if(RentModel::insert_rent($data)) {
			return response()->json(['status'=>true]);
		} 
		return response()->json(['status'=>false]);
	}

	public function update(Request $request) {
		$id = $request = $request->id;
		$data = [
			'status' => 1
		];

		if(RentModel::update_rent($id,$data)) {
			return response()->json(['status'=>true]);
		} 
		return response()->json(['status'=>false]);
	}

	public function destroy($id) {
		if(RentModel::delete_rent($id)) {
			return response()->json(['status'=>true]);
		} 
		return response()->json(['status'=>false]);
	}

	public function get_user_rent(Request $request) {
		$user_id = $request->user_id;

		$rent = RentModel::get_rent_by_userid($user_id); 
		return response()->json($rent);

	}

	public function get_rent(Request $request) {
		$user_id = $request->user_id;
		$rent = RentModel::get_rent_by_user_id($user_id);
		return response()->json($rent);
	}

	public function get_rent_pro(Request $request) {
		$pro_id = $_GET['pro_id'];
		$rent = RentModel::get_rent_by_proid($pro_id);
		return response()->json($rent);

	}

	public function get_status() {
		$status = $_GET['status'];
		$rent = RentModel::get_rent_by_status($status);
		return response()->json($rent);
	}
}