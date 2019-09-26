<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'sku', 'price', 'description', 'file'];

    public function bids()
    {
        return $this->hasMany('App\Bid', 'product_id', 'id');
    }
}
