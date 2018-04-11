<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RentModel extends Model
{

	public static function get_rent() {
		return DB::table('rent')->orderBy('created_at','desc')->get();
	}

	public static function get_rent_by_userid($userid) {
		return DB::table('rent')->where('user_id',$userid)->get();
	}
	public static function get_rent_by_user_id($userid) {
		return DB::table('rent')->where('user_id',$userid)->where('status',0)->get();
	}

	public static function get_rent_by_proid($proid) {
		return DB::table('rent')->where('pro_id',$proid)->get();
	}

	public static function get_rent_by_id($id) {
		$result =  DB::table('rent')->where('id',$id)->get();
		if(EMPTY($result[0])) {
			return false;
		}
		return $result[0];
	}

	public static function get_rent_by_status($stt) {
		return DB::table('rent')->where('status',$stt)->get();
	}

	public static function insert_rent($data) {
		return DB::table('rent')->insert($data);
	}

	public static function update_rent($id,$data) {
		return DB::table('rent')->where('id',$id)->update($data);
	}

	public static function delete_rent($id) {
		return DB::table('rent')->where('id',$id)->delete();
	}
}