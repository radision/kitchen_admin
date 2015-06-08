<?php namespace kitchen\Http\Controllers;

class MerchantController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('merchant.list');
    }

    public function create()
    {

    }

}
