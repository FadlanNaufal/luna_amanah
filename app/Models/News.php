<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_thumbnail',
        'author_id',
        'status',
        'published_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
