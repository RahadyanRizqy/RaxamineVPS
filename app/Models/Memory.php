<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "memories";

    public $timestamps = false;

    public function memory_types()
    {
        return $this->belongsTo(MemoryType::class, 'memory_type_fk');
    }
    
    public function services()
    {
        return $this->hasMany(Service::class, 'vps_memory');
    }
}
