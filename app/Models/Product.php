<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * Get all of the cart for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the subCategory that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
}
