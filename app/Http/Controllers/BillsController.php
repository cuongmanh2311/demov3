<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\ProductsModel;
use App\Http\Models\CategoriesModel;
use App\Http\Models\BillsModel;
use Illuminate\Http\Request;

class BillsController extends Controller {
	public function index() {
		$bills = BillsModel::get_bills();
		return response()->json($bills);
	}

	public function store(Request $request) {
		$data = [
			'member_id'=>$request->member_id,
			'total' => $request->total,
			'status' => $request->status
		];
		$id = BillsModel::insert_bills($data);
		if($id != null) {
			return response()->json([
				'status' => true,
				'id' => $id
			]);
		} else {
			return response()->json([
				'status'=>false
			]);
		}
	}

	public function update(Request $request){
		$id = $request->id;
		$data = [
			
			'status' => $request->status
		];

		if(BillsModel::update_bills($id,$data)) {
			return response()->json([
				'status' => true
			]);
		} else {
			return response()->json([
				'status' => false
			]);
		}
	}

	public function destroy($id) {
		if(BillsModel::delete_bill($id)) {
			return response()->json([
				'status' => true
			]);
		} else {
			return response()->json([
				'status' => false
			]);
		}
	}
	public function get_detail() {
		$bill_id = $_GET['bill_id'];
		$details = BillsModel::get_detail_by_billid($bill_id);
		return response()->json($details);
	}

	public function store_detail(Request $request) {
		$data = [
			'bill_id' => $request->bill_id,
			'pro_id' => $request->pro_id,
			'price' => $request->price,
			'quantity' => $request->quantity,
			'total' => $request->total
		];

		if(BillsModel::insert_bill_detail($data)) {
			return response()->json([
				'status'=>true
			]);
		} else {
			return response()->json([
				'status' => false
			]);
		}
	}

	public function destroy_detail($id) {
		if(BillsModel::delete_detail($id)) {
			return response()->json([
				'status'=>true
			]);
		} else {
			return response()->json([
				'status' => false
			]);
		}
	}
	public function get_detail_pro() {
		$pro_id = $_GET['pro_id'];
		$detail = BillsModel::get_detail_by_proid($pro_id);
		return response()->json($detail); 

	}

	public function get_bill_user() {
		$user_id = $_GET['user_id'];
		$bill = BillsModel::get_bill_user($user_id);
		return response()->json($bill);
	}
}