<?php

namespace App\Models;

use Blueprint\Models\Policy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function prices(): HasMany
    {
        return $this->hasMany(DynamicPricing::class);
    }

    public function policies(): HasMany
    {
        return $this->hasMany(PropertyPolicy::class);
    }

    public function add_ons(): HasMany
    {
        return $this->hasMany(PropertyAddOns::class);
    }
}
