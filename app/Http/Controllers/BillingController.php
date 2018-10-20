<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillItem;
use App\Client;
use App\Product;
use Illuminate\Http\Request;

class BillingController extends Controller
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
     */
    public function new(){
        return view('billing.new');
    }

    public function newitem($idBill)
    {
        $products = Product::all();
        $data = [
            'products' => $products,
            'billId' => $idBill
        ];

        return view('billing.newItem')->with('data', $data);
    }

    /**
     *
     */
    public function edit($id){
        $bill = Bill::with('Client')->with('billItems')->where('idBill', $id)->firstOrFail(); //
        return view('billing.edit')->with('bill', $bill);
    }

    /**
     *
     */
    public function create(Request $data)
    {
        $client = Client::where('idClient', $data['idClient'])->firstOrFail();

        $bill = new Bill;
        $bill->client()->associate($client);
        $bill->save();

        return Redirect('/billing/' . $bill->idBill);
    }

    public function createnewitem(Request $data)
    {
        BillItem::create([
            'idBill' => $data['billId'],
            'idProduct' => $data['idProduct'],
            'price' => $data['price'],
            'description' => $data['description']
        ]);

        return Redirect('/billing/' . $data['billId']);
    }
}

