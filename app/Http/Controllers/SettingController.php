<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\User;
use Auth;
use Hash;
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
        return view('setting.index')
            ->with('productCategories', ProductCategory::all())
            ->with('products', Product::with('productCategory')->get())
            ->with('user', Auth::user());
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

    public function editProductCategory($id)
    {
        return view('setting.editProductCategory')->with('productCategory', ProductCategory::find($id));
    }

    public function createEditProductCategory(Request $data)
    {
        $productCategory = ProductCategory::where('id', $data['id'])->first();
        $productCategory->name = $data['name'];
        $productCategory->save();
        return redirect('settings');
    }

    public function editProduct($id)
    {
        $productCategories = ProductCategory::all();
        $product = Product::with('productCategory')->where('id', $id)->first();
        $data = [
            'productCategories' => $productCategories,
            'product' => $product
        ];

        return view('setting.editProduct')
            ->with('data', $data)
            ->with('product', $product)
            ->with('productCategories', $productCategories);
    }

    public function createEditProduct(Request $data)
    {
        $data->validate([
            'defaultPrice' => 'required|integer'
        ]);

        $product = Product::where('id', $data['id'])->first();
        $product->name = $data['name'];
        $product->product_category_id = $data['productCategory'];
        $product->defaultPrice = $data['defaultPrice'];
        $product->save();

        return redirect('settings');
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

    public function editPersonnalInformationPost(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->email = $request->email;

        if ($request->password != '' && $request->passwordConfirmed == $request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect('settings');
    }
}

