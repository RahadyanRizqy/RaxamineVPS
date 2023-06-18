<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'accounts';

    public $timestamps = false;

    public function services()
    {
        return $this->hasMany(Service::class, 'account_fk');
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_fk');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'account_fk');
    }
}
