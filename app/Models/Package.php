<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'subcategory_id',
        'departure_date',
        'return_date',
        'departure_location',
        'destination_location',
        'airline_name',
        'description',
        'normal_price',
        'discount_percent',
        'discounted_price',
        'quota',
        'status',
        'include_item',
        'exclude_item',
        'itinerary_desc'
    ];

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi dengan Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function packageExcludes()
    {
        return $this->hasMany(PackageExclude::class);
    }

    public function packageIncludes()
    {
        return $this->hasMany(PackageInclude::class);
    }

    public function packageItineraries()
    {
        return $this->hasMany(PackageItinerary::class);
    }

    public function packageGalleries()
    {
        return $this->hasMany(PackageGallery::class);
    }
}
