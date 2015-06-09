<?php namespace kitchen\Http\Controllers;

use kitchen\Http\Models\Merchant;

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

    }

}
