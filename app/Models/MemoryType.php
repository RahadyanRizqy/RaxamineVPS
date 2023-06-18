<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "memory_types";

    public $timestamps = false;

    public function memories()
    {
        return $this->hasMany(Memory::class, "memory_type_fk");
    }
}
