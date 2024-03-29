<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['author_id', 'title', 'thumbnail', 'description', 'slug', 'meta_keywords', 'meta_description'];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id')->where('status', 'published');
    }
}