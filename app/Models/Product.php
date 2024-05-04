<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
                            'verificate',
                            'saler',
                            'imagePath',
                            'name',
                            'price',
                            'priceOld',
                            'description',
                            'certificateId'
                        ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'carts')->withPivot('count');
    }
}
