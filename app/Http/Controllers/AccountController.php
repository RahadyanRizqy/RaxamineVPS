<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\throwException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usersession.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usersession.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $mode)
    {
        try 
        {
            if ($mode == 'login') {
                $credentials = $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                ]);
                if (Auth::attempt($credentials)) 
                {
                    $request->session()->regenerate();
                    
                    if (Auth::user()->role_fk == 2) 
                    {
                        return redirect()->route('section.main');
                    }
                    return redirect()->route('section.main');
                }
                else {
                    return redirect()->back()->withErrors(['error' => 'Akun tidak ditemukan']);
                }
            }
            else if ($mode == 'register')
            {
                $credentials = $request->validate([
                    'fullname' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    'ccnum' => 'required',
                    'cvv' => 'required',
                    'card_exp' => 'required',
                ]);
    
                $credentials['role_fk'] = 2;
                $credentials['registered_at'] = Carbon::now()->format('Y-m-d H:i:s');
                $credentials['password'] = Hash::make($credentials['password']);
    
                Account::create($credentials);
                return redirect()->route('account.index');
            }

        } catch (\Exception $e) {
            throwException($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // return view('section.profile', ['account' => Auth::user()]);
        // view('dashboard', ['section' => 'activity'])
        return view('dashboard', ['section' => 'profile'])->with('account', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function changePassword() // VIEW
    {
        // CASE BASED RESET / CHANGE
    }
    
    public function requestOtp() // VIEW
    {

    }

    public function sendOtpRequest() // DO
    {

    }

    public function validateOtp() // DO
    {

    }
}
