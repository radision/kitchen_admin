<?php namespace kitchen\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Merchant extends Model {

    private static $_table = 'merchant';

    public static function get_all()
    {
        return DB::table(self::$_table)->orderBy('created_at', 'desc')->get();
    }

    public static function get_one($merchant_id)
    {
        return DB::table(self::$_table)->where('merchant_id', $merchant_id)->first();
    }

    public static function add($data)
    {
        return DB::table(self::$_table)->insertGetId($data);
    }

    public static function change($id, $data)
    {
        $data['updated_at'] = time();
        return DB::table(self::$_table)->where('merchant_id', $id)->update($data);
    }

    public static function remove($id)
    {
        $data = array(
            'status' => 0,
            'updated_at' => time()
        );
        return DB::table(self::$_table)->where('merchant_id', $id)->update($data);
    }

}
