<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'prices';

    protected $fillable = ['product_id', 'stock_id', 'purchase', 'retail', 'wholesale', 'author_id'];
}