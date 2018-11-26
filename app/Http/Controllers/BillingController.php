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

    public function edit($id){
        $bill = Bill::with('client')->where('id', $id)->first();
        $billItems = BillItem::where('bill_id', $id)->with('product')->get();

        $total = 0;
        foreach ($billItems as $item)
            $total += $item['price'];

        return view('billing.edit')
            ->with('bill', $bill)
            ->with('billItems', $billItems)
            ->with('total', $total);
    }

    public function create(Request $data)
    {
        $client = Client::find($data['client_id']);
        $bill = new Bill;
        $bill->client()->associate($client);
        $bill->save();

        return Redirect()->route('billing.edit', ['id' => $bill->id]);
    }

    public function createnewitem(Request $data)
    {
        $data->validate([
            'price' => 'required|integer'
        ]);

        BillItem::create([
            'bill_id' => $data['billId'],
            'product_id' => $data['idProduct'],
            'price' => $data['price'],
            'description' => $data['description'],
        ]);

        return Redirect('/billing/' . $data['billId']);
    }

    public function deleteitem($id)
    {
        $billItem = BillItem::find($id);
        $idBill = $billItem['idBill'];
        $billItem->delete();

        return redirect()->route('billing.edit', ['id' => $idBill]);
    }
}

