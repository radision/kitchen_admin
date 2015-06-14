<?php namespace kitchen\Http\Controllers;

use kitchen\Http\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $list = Merchant::get_all();
        return view('merchant.list')
            ->with('list', $list);
    }

    public function create()
    {
        return view('merchant.create');
    }

    public function save(Request $request)
    {
        $title = $request->input('title', '');
        $desc = $request->input('desc', '');
        $shipping = $request->input('shipping', '');

        $data = array(
            'title' => $title,
            'desc' => $desc,
            'shipping' => $shipping,
            'status' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        );
        Merchant::add($data);
        return redirect('merchant');
    }

    public function edit($merchant_id)
    {
        $merchant = Merchant::get_one($merchant_id);
        return view('merchant.edit')
            ->with('merchant', $merchant)
            ->with('merchant_id', $merchant_id);
    }

    public function update(Request $request, $merchant_id)
    {
        $title = $request->input('title', '');
        $desc = $request->input('desc', '');
        $shipping = $request->input('shipping', '');

        $data = array(
            'title' => $title,
            'desc' => $desc,
            'shipping' => $shipping,
            'updated_at' => time(),
        );
        Merchant::change($merchant_id, $data);
        return redirect('merchant');
    }

}
