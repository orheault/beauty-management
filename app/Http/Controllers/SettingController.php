<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

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
        return view('setting.index')->with('data', [
            'productCategories' => ProductCategory::all(),
            'products' => Product::with('productCategory')->get()]);
    }

    public function newProductCategory()
    {
        return view('setting.newProductCategory');
    }

    public function newProduct()
    {
        $productCategories = ProductCategory::all();
        $data = [
            'productCategories' => $productCategories
        ];

        return view('setting.newProduct')->with('data', $data);
    }

    public function createNewProductCategory(Request $data)
    {
        ProductCategory::create(['name' => $data['name']]);

        return redirect('settings');
    }

    public function createNewProduct(Request $data)
    {
        $data->validate([
            'defaultPrice' => 'required|integer'
        ]);

        Product::create([
            'name' => $data['name'],
            'product_category_id' => $data['productCategory'],
            'defaultPrice' => $data['defaultPrice']
        ]);

        return redirect('settings');
    }
}

