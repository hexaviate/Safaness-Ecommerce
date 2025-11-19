<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{

    protected $guarded = [];

    /**
     * Get all of the transactionDetail for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Get the buyer that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class);
    }

    public function couriers()
    {
        return $this->hasMany(Courier::class);
    }
}
