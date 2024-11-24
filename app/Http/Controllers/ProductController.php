<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Menampilkan semua produk
    public function index()
    {
        $pageTitle = 'Product List';

        $products = Product::all();

        return view('admin.product', compact('products', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Product';

        // ELOQUENT
        $products = Product::all();

        return view('admin.create', compact('pageTitle', 'products'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'unique' => ':attribute harus unik'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'picture' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $picture = $request->file('picture');
        $filename = date('Y-m-d').$picture->getClientOriginalName();
        $path = 'product-picture/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($picture));

            // ELOQUENT
            $product = New Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->picture = $filename;
            $product->save();

            return redirect()->route('products.index');
    }

    // Menampilkan produk berdasarkan ID
    public function show($id)
    {
        $pageTitle = 'Product Detail';

        // ELOQUENT
        $product = Product::find($id);

        return view('admin.show', compact('pageTitle', 'product'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit';

        // ELOQUENT
        $product = Product::find($id);

        return view('admin.edit', compact('pageTitle', 'product'));
    }

    // Memperbarui produk berdasarkan ID
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'unique' => ':attribute harus unik'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'picture' => 'nullable|mimes:png,jpg,jpeg|max:2048', // ubah validasi gambar
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);

        // Periksa apakah file gambar diunggah
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = date('Y-m-d').$picture->getClientOriginalName();
            $path = 'product-picture/'.$filename;

            Storage::disk('public')->put($path, file_get_contents($picture));

            // Jika gambar berhasil diunggah, perbarui field gambar di database
            $product->picture = $filename;
        }

        // Perbarui field lainnya
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index');
    }

    // Menghapus produk berdasarkan ID
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->route('products.index');
    }
}
