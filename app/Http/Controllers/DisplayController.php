<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function home()
    {
        return view('user.homeUser');
    }

    // public function shop()
    // {
    //     return view('user.shopUser');
    // }

    public function about()
    {
        return view('user.aboutUser');
    }
}
