<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function doTransact(Request $request)
    {
        $acc = Account::find(Auth::id());
        $acc->balance = $request['balance'] + $acc->balance;
        $acc->save();
        return redirect()->route('user.profile');
    }

    public function formTransact()
    {
        return view('partials.payment');
    }
}
