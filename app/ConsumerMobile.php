<?php namespace kitchen;

use Illuminate\Database\Eloquent\Model;

class ConsumerMobile extends Model {

    private $_table = 'consumer_mobile';

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
        return DB::table(self::$_table)->where('consumer_mobile_id', $id)->update($data);
    }

    public static function delete($id)
    {
        return DB::table(self::$_table)->where('consumer_mobile_id', $id)->update(array('status' => 0));
    }


}
