<?php namespace kitchen\Http\Controllers;

use kitchen\Http\Models\Order;
use kitchen\Http\Models\Address;
use kitchen\Http\Models\ConsumerMobile;
use kitchen\Http\Models\Goods;
use kitchen\Http\Models\Merchant;
use Illuminate\Http\Request;

class OrderController extends Controller {

    public function index()
    {
        $orders = Order::get_all();
        $merchants = Merchant::get_all();
        $goods = Goods::get_all();
        $address = Address::get_all();
        $consumer_mobiles = ConsumerMobile::get_all();
        return view('order.list')
            ->with('orders', $orders)
            ->with('address', $address)
            ->with('consumer_mobiles', $consumer_mobiles)
            ->with('goods', $goods)
            ->with('merchants', $merchants);
    }

    public function detail($order_id)
    {
        $order = Order::get_one($order_id);
        $address = Address::get_one($order->address_id);
        $consumer_mobile = ConsumerMobile::get_one($order->consumer_mobile_id);
        $goods = Goods::get_one($order->goods_id);
        $merchant = Merchant::get_one($goods->merchant_id);
        return view('order.detail')
            ->with('order', $order)
            ->with('address', $address)
            ->with('consumer_mobile', $consumer_mobile)
            ->with('goods', $goods)
            ->with('merchant', $merchant);
    }

}
