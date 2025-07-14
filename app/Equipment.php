<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    
    protected $table = 'equipment';
    protected $guarded = [];

    function users(){
        return $this->belongsTo('App\User', 'id_user');
    }
    function instansi(){
        return $this->belongsTo('App\Instansi', 'id_instansi');
    }
    function brands(){
        return $this->belongsTo('App\Brand', 'brand_id');
    }
    function categories(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    function poducts(){
        return $this->belongsTo('App\Product', 'products_id');
    }
}
