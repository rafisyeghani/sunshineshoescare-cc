<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User; // Pastikan untuk mengimpor model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
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
    public function index()
    {
        $pageTitle = 'Transaction List';

        $transactions = Transaction::all();

        return view('admin.transaction', compact('transactions', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Create Transaction';
        $products = Product::all(); // Get all products for dropdown
        $users = User::all(); // Get all users for dropdown

        return view('admin.createTransaction', compact('pageTitle', 'products', 'users'));
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

        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Transaction Detail';

        // ELOQUENT
        $transaction = Transaction::find($id);

        return view('admin.showTransaction', compact('pageTitle', 'transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Transaction';
        $transaction = Transaction::find($id);
        $products = Product::all(); // Get all products for dropdown
        $users = User::all(); // Get all users for dropdown

        return view('admin.editTransaction', compact('pageTitle', 'transaction', 'products', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            // 'quantity' => 'required|numeric',
            'address' => 'required|string|max:255',
            // 'picture' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'status' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transaction = Transaction::find($id);
        $transaction->product_id = $request->product_id;
        $transaction->user_id = $request->user_id;
        $transaction->transaction_date = $request->transaction_date;
        // $transaction->quantity = $request->quantity;
        $transaction->address = $request->address;
        $transaction->status = $request->status;
        $transaction->save();

        // Hitung selisih jumlah transaksi baru dengan jumlah transaksi lama
        $product = Product::find($request->product_id);
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();

        return redirect()->route('transactions.index');
    }
}
