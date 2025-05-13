<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{

    /**
     * Get all of the  for the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactionDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }


    /**
     * Get the buyer that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(Buyer::class);
    }

    /**
     * Get the product that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
