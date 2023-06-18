<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "operating_systems";

    public $timestamps = false;

    public function versions()
    {
        return $this->hasMany(Version::class, 'operating_systems_fk');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'vps_os');
    }
}
