<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
