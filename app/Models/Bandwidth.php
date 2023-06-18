<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandwidth extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "bandwidths";

    public $timestamps = false;

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'servers', 'bandwidth_fk', 'location_fk');
    }

    // public function services()
    // {
    //     return $this->hasMany(Service::class, 'vps_bandwidth');
    // }

}
