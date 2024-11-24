<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($product_id, $user_id)
    {
        $product = Product::find($product_id);
        $user = User::find($user_id);

        return view('checkout', compact('product', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka',
            'unique' => ':attribute harus unik',
            'mimes' => ':attribute harus berupa file dengan format png, jpg, jpeg',
            'max' => ':attribute tidak boleh lebih dari :max kilobyte'
        ];

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'transaction_date' => 'required|date',
            'quantity' => 'required|numeric',
            'address' => 'required|string|max:255',
            'picture' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $picture = $request->file('picture');
        $filename = date('Y-m-d').$picture->getClientOriginalName();
        $path = 'transaction-picture/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($picture));

        // ELOQUENT
        $transaction = new Transaction();
        $transaction->product_id = $request->product_id;
        $transaction->user_id = $request->user_id;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->quantity = $request->quantity;
        $transaction->address = $request->address;
        $transaction->picture = $filename;
        $transaction->status = 'Process';
        $transaction->save();

        // Kurangi stok produk yang terkait dengan jumlah transaksi
        $product = Product::find($request->product_id);
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('shop')->with('success', 'Transaction completed successfully');
    }

}
