<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CategoriesModel extends Model
{
	public static function get_cates() {
		return DB::table('categories')->get();
	}

	public static function get_cates_by_id($id) {
		$result = DB::table('categories')->where('id',$id)->get();
		if(EMPTY($result[0])) {
			return false;
		}
		return $result[0];
	}

	public static function get_cates_paging($vt, $limit) {
		return DB::table('categories')->skip($vt)->take($limit)->get();
	}

	public static function get_cates_by_parentid($parentid) {
		return DB::table('categories')->where('parent_id',$parentid)->get();
	}

	public static function insert_cates($data) {
		return DB::table('categories')->insert($data);
	}

	public static function update_cates($id,$data) {
		return DB::table('categories')->where('id',$id)->update($data);
	}

	public static function delete_cates($id) {
		return DB::table('categories')->where('id',$id)->delete();
	}
}