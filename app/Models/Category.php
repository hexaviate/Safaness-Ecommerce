<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{

    protected $fillable = ['name', 'slug'];

    /**
     * Get all of the subCategory for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategory(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
