<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_address_3',
        'city',
        'country_code',
        'zip_postal_code',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot('quantity');
    }
}
