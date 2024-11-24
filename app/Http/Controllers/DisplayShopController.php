<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DisplayShopController extends Controller
{
    public function index()
    {
        $pageTitle = 'Shopping Page';

        $products = Product::all();
        return view('user.shopUser', compact('products', 'pageTitle'));
    }

    public function show($id)
    {
        $pageTitle = 'Details Produk';

        $product = Product::findOrFail($id);
        return view('user.detailsUser', compact('product', 'pageTitle'));
    }
}
