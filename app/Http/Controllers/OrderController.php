<?php

namespace App\Http\Controllers;

use Dompdf\Adapter\PDFLib;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User; // Import model User
use PDF; // Import PDF from Dompdf library

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $user = User::findOrFail($id);

        // Get transactions associated with the user
        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $pageTitle = 'Order History';

        return view('order', compact('transactions', 'pageTitle', 'user'));
    }

    public function exportPdf($id)
    {
        $user = User::findOrFail($id);

        // Get transactions associated with the user
        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $pdf = PDF::loadView('pdf', compact('transactions', 'user'));

        return $pdf->download('order-history.pdf');
    }
}
