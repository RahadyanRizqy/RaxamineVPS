<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "services";

    public $timestamps = false;
    
    
    public function versions()
    {
        return $this->belongsTo(Version::class, 'vps_version');
    }

    public function cores()
    {
        return $this->belongsTo(Core::class, 'vps_core');
    }
    
    public function rams()
    {
        return $this->belongsTo(Memory::class, 'vps_ram');
    }
    
    public function roms()
    {
        return $this->belongsTo(Memory::class, 'vps_rom');
    }
    
    public function servers()
    {
        return $this->belongsTo(Server::class, 'vps_server');
    }
    
    public function accounts()
    {
        return $this->belongsTo(Account::class, 'account_fk');
    }

    public function transactions()
    {
        return $this->hasOne(Transaction::class, 'ordered_vps_id');
    }
}
        