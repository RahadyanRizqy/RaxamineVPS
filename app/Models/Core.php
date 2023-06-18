<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Core extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "cores";

    public $timestamps = false;

    public function cpus()
    {
        return $this->belongsTo(CPU::class, "cpu_fk");
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'vps_core');
    }
}
