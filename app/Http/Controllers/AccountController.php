<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\throwException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usersession.login', ['session' => 'Masuk']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usersession.register', ['session' => 'Daftar']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $mode)
    {
        if ($mode == 'login') {
            try
            {
                $validator = Validator::make($request->all(), [
                    'email' => ['required', 'regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/'],
                    'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()_=\-+[\]{}"\\|\'\';:,.\/<>?])[A-Za-z\d~!@#$%^&*()_=\-+[\]{}"\\|\'\';:,.\/<>?]{8,}$/'],
                ]);
    
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
    
                $credentials = $request->only('email', 'password');
    
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->route('section.main');
                }
    
                else 
                {
                    return redirect()->back()->withErrors(['error' => 'Akun tidak ditemukan']);
                }
            }
            catch (Exception $e)
            {
                throwException($e);
            }
        }
        else if ($mode == 'register')
        {
            try {
                $credentials = $request->validate([
                    'fullname' => 'required',
                    'email' => ['required', 'regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/'],
                    'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[~!@#$%^&*()_=\-+[\]{}"\\|\'\';:,.\/<>?])[A-Za-z\d~!@#$%^&*()_=\-+[\]{}"\\|\'\';:,.\/<>?]{8,}$/'],
                    'cc_number' => 'nullable',
                    'cc_cvv' => 'nullable',
                    'cc_expire' => 'nullable',
                ]);
    
                $credentials['role_fk'] = 2;
                $credentials['registered_at'] = Carbon::now()->format('Y-m-d H:i:s');
                $credentials['password'] = Hash::make($credentials['password']);
    
                // Account::create($credentials);
                // return redirect()->route('account.index');
                dd($credentials);
            }
            catch (Exception $e)
            {
                throwException($e);
            }
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
