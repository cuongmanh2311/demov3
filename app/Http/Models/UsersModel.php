<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UsersModel extends Model
{

	public static function get_users() {
		return DB::table('users')->get();
	}

	public static function get_users_paging($vt = 0, $limit = 0) {
		return DB::table('users')->skip($vt)->take($limit)->get();
	}

	public static function get_users_by_id($id) {
		$result = DB::table('users')->where('id',$id)->get();
		if(EMPTY($result[0])) {
			return false;
		}
		return $result[0];
	}

	public static function login($email,$password) {
		$result = DB::table('users')->where('email','=',$email)->where('password','=',$password)->get();
		if(EMPTY($result[0])) {
			return false;
		}
		return $result[0];
	}

	public static function get_users_by_role($roleid) {
		return DB::table('users')->where('role','<=',$roleid)->get();
	}

	public static function get_permission() {
		return DB::table('permission')->get();
	}

	public static function get_permission_by_id($id) {
		$result =  DB::table('permission')->where('id',$id)->get();
		if(EMPTY($result[0]))
			return false;
		return $result[0];
	}

	public static function get_permission_by_roleid($roleid) {
		return DB::table('permission')->where('id','<=',$roleid)->get();
	}


	public static function insert_users($data) {
		return DB::table('users')->insertGetId($data);
	}

	public static function update_users($id,$data) {
		return DB::table('users')->where('id',$id)->update($data);
	}

	public static function delete_users($id) {
		return DB::table('users')->where('id',$id)->delete();
	}

	public static function search_users($name) {
		return DB::table('users')->where('name','like','%'.$name.'%')->get();
	}

	public static function insert_permission($data) {
		return DB::table('permission')->insert($data);
	}

	public static function update_permission($id,$data) {
		return DB::table('permission')->where('id',$id)->update($data);
	}

	public static function delete_permission($id) {
		return DB::table('permission')->where('id',$id)->delete();
	}


}