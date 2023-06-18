<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "servers";

    public $timestamps = false;

    public function bandwidths()
    {
        return $this->belongsTo(Bandwidth::class, 'bandwidth_fk');
    }

    public function locations()
    {
        return $this->belongsTo(Location::class, 'location_fk');
    }
}
