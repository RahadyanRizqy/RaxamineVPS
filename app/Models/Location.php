<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "locations";

    public $timestamps = false;

    public function bandwidths()
    {
        return $this->belongsToMany(Bandwidth::class, 'servers', 'location_fk', 'bandwidth_fk');
    }

    // public function services()
    // {
    //     return $this->hasMany(Service::class, 'vps_location');
    // }
}
