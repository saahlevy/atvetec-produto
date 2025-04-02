<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
    ];

    public function productOffers()
    {
        return $this->hasMany(ProductOffer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
