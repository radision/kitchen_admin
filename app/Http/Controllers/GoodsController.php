<?php namespace kitchen\Http\Controllers;

use kitchen\Http\Models\Goods;
use kitchen\Http\Models\Merchant;
use Illuminate\Http\Request;

class GoodsController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $merchants = Merchant::get_all();
        $list = Goods::get_all();
        return view('goods.list')
            ->with('list', $list)
            ->with('merchants', $merchants);
    }

    public function create()
    {
        $merchant = Merchant::get_all();
        return view('goods.create')
            ->with('merchant', $merchant);
    }

    public function save(Request $request)
    {
        $merchant_id = $request->input('merchant_id', 0);
        $title = $request->input('title', '');
        $desc = $request->input('desc', '');

        $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(base_path() . '/public/upload/', $image_name);

        $data = array(
            'merchant_id' => $merchant_id,
            'title' => $title,
            'desc' => $desc,
            'picture_url' => $image_name,
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        );
        Goods::add($data);
        return redirect('goods');
    }

    public function edit($goods_id)
    {
        $goods = Goods::get_one($goods_id);
        $merchant = Merchant::get_one($goods->merchant_id);
        return view('goods.edit')
            ->with('goods', $goods)
            ->with('merchant', $merchant);
    }

    public function update(Request $request, $goods_id)
    {
        $title = $request->input('title', '');
        $desc = $request->input('desc', '');

        $data = array(
            'title' => $title,
            'desc' => $desc,
            'updated_at' => time(),
        );

        if ($request->file('image'))
        {
            $image_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(base_path() . '/public/upload/', $image_name);
            $data['picture_url'] = $image_name;
        }

        Goods::change($goods_id, $data);
        return redirect('goods');
    }

}
