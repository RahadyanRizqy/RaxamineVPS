<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Activity;
use App\Models\Bandwidth;
use App\Models\Core;
use App\Models\CPU;
use App\Models\Location;
use App\Models\Memory;
use App\Models\MemoryType;
use App\Models\OperatingSystem;
use App\Models\Server;
use App\Models\Version;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SERVICES FOR ADMIN ONLY
        $services = Service::with(['versions.operating_systems', 'versions', 'cores.cpus', 'cores', 'rams', 'roms', 'servers.locations', 'servers.bandwidths', 'accounts'])->get();
        return view('section.service')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function order()
    {
        $oss = OperatingSystem::all();
        $cpu = CPU::all();
        $ram = MemoryType::with('memories')->find(1)->memories;
        $rom = MemoryType::with('memories')->find(2)->memories;
        $loc = Location::all();
        $bdw = Bandwidth::all();
        $dbn = [1,2,3,4,5,6,7,8,9,10,11,12];
        $price = [0,3,5,7,10,13,16,20,24,28,33,38];
        return view('partials.vps')->with(compact('oss', 'cpu', 'ram', 'rom', 'loc', 'bdw', 'dbn', 'price'))->with('i', 0);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TO LOWERS
        $result = $request->all();
        $account = Account::find(Auth::id());
        $loc = $result['vps_location'];
        $bdw = $result['vps_bandwidth'];  
        $loc_label = Location::find($loc)->label;
        $bdw_value = Bandwidth::find($bdw)->value;
        $name = OperatingSystem::find($result['vps_os'])->name;
        $releases = Version::find($result['vps_version'])->releases;
        $cpu = CPU::find($result['vps_cpu'])->cpu_name;
        $core = Core::find($result['vps_core'])->core_qty;
        $rom = Memory::find($result['vps_rom'])->memory_size;
        $ram = Memory::find($result['vps_ram'])->memory_size;

        // TO INSERT AND RETRIEVE PRIMARY KEY
        $getId = $request->except(['_token', 'vps_location', 'vps_bandwidth', 'vps_duration']);
        $getId['vps_server'] = Server::where('location_fk', $loc)->where('bandwidth_fk', $bdw)->first()->id;
        $getId['account_fk'] = Auth::id();
        $getId['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $getId['expired_at'] = Carbon::parse($getId['created_at'])->addMonth()->format('Y-m-d H:i:s');
        $primaryKey = Service::insertGetId($getId);

        // ID
        $lower = strtolower(str_replace(' ', '_', $name)) . "_" . strtolower(str_replace(' ', '_', $releases)) . "_x86_64_" . strtolower(str_replace(' ', '_', $cpu)) . "_" . strtolower(str_replace(' ', '_', $core)) . "vcpu_" . strtolower(str_replace(' ', '_', $ram)) . "_" . strtolower(str_replace(' ', '_', $rom)) . "_" . strtolower(str_replace(' ', '_', $loc_label)) . "_" . strtolower(str_replace(' ', '_', $bdw_value)) . "_vps_id_" . "$primaryKey";
        
        // UPDATE
        Service::find($primaryKey)->update(['vps_name' => $lower]);
        $reduceBalance = $account->balance - Service::find($primaryKey)->vps_total_price;
        $account->balance = $reduceBalance;
        $account->save();

        $activity = new Activity;
        $activity->insertActivity([
            'detail' => "Telah memesan VPS dengan ID " . "$primaryKey",
            'account_fk' => $account->id,
        ]);

        return redirect()->route('section.main');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('partials.service', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Service::find($id)->update([
            'last_login' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
