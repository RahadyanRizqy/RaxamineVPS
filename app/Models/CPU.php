<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "cpus";

    public $timestamps = false;

    public function cores()
    {
        return $this->hasMany(Core::class, "cpu_fk");
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'vps_cpu');
    }
}
