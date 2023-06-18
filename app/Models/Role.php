<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'roles';

    public $timestamps = false;

    public function accounts()
    {
        return $this->hasMany(Account::class, 'role_fk');
    }
}
