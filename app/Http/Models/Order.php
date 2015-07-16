<?php namespace kitchen\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model {

    private static $_table = 'order';

    public static function get_all()
    {
        return DB::table(self::$_table)->orderBy('created_at', 'desc')->get();
    }

    public static function get_one($order_id)
    {
        return DB::table(self::$_table)->where('order_id', $order_id)->first();
    }

    public static function add($data)
    {
        return DB::table(self::$_table)->insertGetId($data);
    }

}
