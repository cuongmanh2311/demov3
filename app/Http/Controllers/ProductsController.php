<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller {


	public function index(){

		$products = ProductsModel::get_products();
		return response()->json($products);
	}

	public function show($id) {
		$product = ProductsModel::get_products_by_id($id);

		return response()->json($product);
	}

	public function store(Request $request) {
		$data = [
			'name' => $request->name,
			'cate_id' => $request->cate_id,
			'price' => $request->price,
			'intro' => $request->intro,
			'description' => $request->description,
			'image' => $request->image
		];		
		if(ProductsModel::insert_products($data)) {
			return response()->json([
				'status' =>true
			]);
		}
		return response()->json([
				'status' =>false
			]);

	}

	public function update(Request $request) {
		$id = $request->id;
		$product = ProductsModel::get_products_by_id($id);
		$name = $product->name;
		$cate_id = $product->cate_id;
		$price = $product->price;
		$intro = $product->intro;
		$description = $product->description;
		$image = $product->image;
		$status = $product->status;
		if($request->name != null) {
			$name = $request->name;
		}
		if($request->cate_id != null) {
			$cate_id = $request->cate_id;
		}
		if($request->price != null) {
			$price = $request->price;
		}
		if($request->intro != null) {
			$intro = $request->intro;
		}
		if($request->description != null) {
			$description = $request->description;
		}
		if($request->image != null) {
			$image = $request->image;
		}
		if($request->status != null) {
			$status = $request->status;
		}

		$data = [
			'name' => $name,
			'cate_id' => $cate_id,
			'price' => $price,
			'intro' => $intro,
			'description' => $description,
			'image' => $image,
			'status' => $status
		];		

		if(ProductsModel::update_products($id,$data)) {
			return response()->json([
				'status' =>true
			]);
		}
		return response()->json([
				'status' =>false
			]);
	}
	static function soft_cate(Request $request) {
		$cate_id = $_GET['cate_id'];
		$limit = $_GET['limit'];
		$products = ProductsModel::get_products_by_cateid_view($cate_id,$limit);
		return response()->json($products);
	}

	public function destroy($id) {
		if(ProductsModel::del_products($id)) {
			return response()->json(['status'=>true]);
		}
		return response()->json(['status'=>true]);
	}

	public function search() {
		$name = $_GET['name'];
		$products = ProductsModel::search_products_by_name($name);
		return response()->json($products);
	}

	public function cate_product() {
		$cate_id = $_GET['cate_id'];
		$products = ProductsModel::get_products_by_cateid($cate_id);
		return response()->json($products);
	}

	public function paging(Request $request) {
		$vt = $_GET['vt'];
		$limit = $_GET['limit'];

		$products = ProductsModel::get_products_paging($vt,$limit);
		return response()->json($products);
	}
}