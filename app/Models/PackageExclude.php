<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageExclude extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'exclude_item',
        'package_id'
    ];

    // Relasi dengan Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
