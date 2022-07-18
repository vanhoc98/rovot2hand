<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";

    protected $primaryKey = 'product_id';
    protected $guarded = [];

    public function pro_cate(){
    	return $this->belongsTo('App\Category','category_id');
    }
}
