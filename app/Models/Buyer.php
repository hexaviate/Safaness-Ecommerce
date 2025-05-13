<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Cart;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Buyer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Get all of the cart for the Buyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get all of the transaction for the Buyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

}
