<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = "transactions";

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;

    public function services()
    {
        return $this->belongsTo(Service::class, 'ordered_vps_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->transaction_id = str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
