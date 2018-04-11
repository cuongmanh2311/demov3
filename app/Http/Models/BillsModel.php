<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class BillsModel extends Model
{
	public static function get_bills() {
		return DB::table('bills')->get();
	}

	public static function get_detail_by_billid($id) {
		return DB::table('bill_detail')->where('bill_id',$id)->get();
		
	}

	public static function get_detail_by_proid($id) {
		return DB::table('bill_detail')->where('pro_id',$id)->get();
	}

	public static function get_bill_user($id) {
		return DB::table('bills')->where('member_id',$id)->get();
	}
	
	public static function insert_bills($data) {
		return DB::table('bills')->insertGetId($data);
	}

	public static function update_bills($id,$data) {
		return DB::table('bills')->where('id',$id)->update($data);
	}

	public static function insert_bill_detail($data) {
		return DB::table('bill_detail')->insert($data);
	}

	public static function delete_bill($id) {
		return DB::table('bills')->where('id',$id)->delete();
	}

	public static function delete_detail($id) {
		return DB::table('bill_detail')->where('id',$id)->delete();
	}

}