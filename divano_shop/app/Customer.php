<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    protected $primaryKey = 'customer_id';
    public $timestamps = false;
    protected $fillable = [
    	'customer_name', 'customer_email', 'customer_address','customer_phone','customer_pay','customer_note'
    ];

    public function cusTo(){
        return $this->hasMany('App\Order','cus_id');
    }
}
