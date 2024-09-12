<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categoris';

    protected $fillable = ['name'];

    /**
     * Relasi ke Subcategory
     */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    
    /**
     * Relasi ke Gallery
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
