<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "versions";

    public $timestamps = false;

    public function operating_systems()
    {
        return $this->belongsTo(OperatingSystem::class, 'operating_systems_fk');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'vps_version');
    }
}
