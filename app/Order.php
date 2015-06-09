<?php namespace kitchen;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    private $_table = 'order';

    public static function list()
    {
        return DB::table(self::$_table)->orderBy('created_at', 'desc')->get();
    }

    public static function add($data)
    {
        return DB::table(self::$_table)->insertGetId($data);
    }

    public static function update($id, $data)
    {
        return DB::table(self::$_table)->where('order_id', $id)->update($data);
    }

}
