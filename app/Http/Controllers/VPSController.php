<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Bandwidth;
use App\Models\Core;
use App\Models\Location;
use App\Models\MemoryType;
use App\Models\OperatingSystem;
use App\Models\Version;
use App\Models\VPS;
use App\Models\CPU;
use App\Models\Memory;
use App\Models\Server;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VPSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oss = OperatingSystem::all();
        $cpu = CPU::all();
        $ram = MemoryType::with('memories')->find(1)->memories;
        $rom = MemoryType::with('memories')->find(2)->memories;
        $loc = Location::all();
        $bdw = Bandwidth::all();
        $dbn = [1,2,3,4,5,6,7,8,9,10,11,12];
        $price = [0,3,5,7,10,13,16,20,24,28,33,38];
        return view('section.vps')->with(compact('oss', 'cpu', 'ram', 'rom', 'loc', 'bdw', 'dbn', 'price'))->with('i', 0);
    }


    public function getVersions(Request $request)
    {
        // $versions = VPS::where('name', $request->os_name)->pluck('version')->first();
        // $result = [];    
        // if ($versions) {
        //     $versions = json_decode($versions);
            
        //     foreach ($versions as $version) {
        //         $result[] = ['ver' => "$version x86-64"];
        //     }
        // }
        // return json_encode($result);
        $result = OperatingSystem::with('versions')->find($request->os_id)->versions;
        // $result = $request->os;
        return json_encode($result);       
    }

    public function getCores(Request $request)
    {
        $result = CPU::with('cores')->find($request->cpu_id)->cores;
        return json_encode($result); 
    }

    public function getCores2(Request $request)
    {
        // $result = CPUType::with('cores')->find(1)->cores;
        // return json_encode($result); 
    }


    public function getStorage(Request $request)
    {
   //     $storages = Memories::pluck('memory_size')->where('memory_type', )
   //     return json_encode($storages);
        // $storages = Memory::
    }

    // public function getMemory(Request $request)
    // {
    //     $memories = Memory::pluck('memory_size');
    //     return json_encode($memories);
    // }


    public function getJSONed(Request $request)
    {
        // $data = json_decode(VPS::where('id', 3)->get('version'));
        // $datas = [];
        // foreach ($data as $d) {
        //     $datas[] = $d;
        // }
        // return response()->json($datas[0]);
        // $data = VPS::all('name');
  
        // return response()->json($data);

        // $json2 = (VPS::where('id', 3)->get('version'));
        // $json = response()->json(VPS::where('id', 1)->get('version'))->content();
        // $data = json_decode($json, true);
        // $versions = json_decode($data[0]['version']);
        // $result = [];
        // foreach ($versions as $version) {
        //     $result[] = ['ver' => $version];
        // }
        // $output = json_encode($result);
        // dd($output);
        // dd(response()->json($json));
    }

    public function terminal($id)
    {
        $services = Service::with(['versions.operating_systems', 'versions', 'cores.cpus', 'cores', 'rams', 'roms', 'servers.locations', 'servers.bandwidths', 'accounts'])->where('account_fk', Auth::id())->find($id);
        return view('partials.terminal')->with(['services' => $services, 'id' => $id, 'curdate' => Carbon::now()->format('Y-m-d H:i:s')]);
    }
}
