<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Service;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function main()
    {
        $services = Service::with(['versions.operating_systems', 'versions', 'cores.cpus', 'cores', 'rams', 'roms', 'servers.locations', 'servers.bandwidths', 'accounts'])->where('account_fk', Auth::id())->get();
        return view('dashboard', ['section' => 'main'])->with(compact('services'));
    }

    public function activity()
    {
        $activities = Activity::where('account_fk', Auth::id())->get();
        return view('dashboard', ['section' => 'activity'])->with(compact('activities'));
        
    }

    public function transaction()
    {
        $transaction = Service::with('transactions')->where('account_fk', Auth::id())->get();
        return view('dashboard', ['section' => 'transaction'])->with(compact('transaction'));
    }
}
