<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";

    protected $primaryKey = 'blog_id';
    protected $guarded = [];

    public function blogcate(){
    	return $this->hasMany('App\Category','category_id');
    }
}
