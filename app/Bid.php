<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
	protected $fillable = ['email', 'amount'];
	
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
