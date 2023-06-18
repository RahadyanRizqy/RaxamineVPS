<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "activities";

    public $timestamps = false;

    public function accounts()
    {
        $this->belongsTo(Account::class, 'account_fk');
    }

    public function insertActivity($data)
    {
        $this->insert($data);
    }
}
