<?php

namespace App\Http\Controllers;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setting.index');
    }

    public function newCategory()
    {

    }

    public function newitem()
    {

    }
}

