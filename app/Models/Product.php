<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primary = 'id';
    protected $fillable = ['title', 'description', 'price', 'discount_price', 'quantity', 'category', 'image'];
}
