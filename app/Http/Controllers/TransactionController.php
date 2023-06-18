<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function doTransact()
    {
        return view('section.payment');
    }
}
