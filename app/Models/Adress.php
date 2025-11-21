<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $guarded = [];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
