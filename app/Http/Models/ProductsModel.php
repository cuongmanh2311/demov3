<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductsModel extends Model
{
	public static function get_products() {
		return DB::table('products')
		->where('status','=',0)
		->orderBy('id','desc')
		->get();
	}

	public static function get_products_paging($vt = 0 , $limit = 0) {
		return DB::table('products')->where('status','=',0)->skip($vt)->take($limit)->get();
	}

	public static function get_products_by_id($id) {
		$result = DB::table('products')->where('id',$id)->get();
		if(empty($result[0])) {
			return false;
		}
		return $result[0];
	}

	public static function get_products_by_cateid_view($cate_id,$qty) {
		return DB::table('products')->where('cate_id',$cate_id)->orderBy('view','desc')->skip(0)->take($qty)->get();
	}

	public static function search_products_by_name($name) {
		return DB::table('products')
			->where('status','=',0)
			->where('name','like','%'.$name.'%')
			->orderBy('id','desc')
			->get();
	}

	public static function get_products_by_cateid($cate_id) {
		return DB::table('products')->where('cate_id',$cate_id)->where('status','=',0)->get();
	}


	public static function insert_products($data) {
		return DB::table('products')->insert($data);
	}

	public static function update_products($id,$data) {
		return DB::table('products')->where('id',$id)->update($data);

	}

	public static function del_products($id) {
		return DB::table('products')->where('id',$id)->delete();
	}

}
