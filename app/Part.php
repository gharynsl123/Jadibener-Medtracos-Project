<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';
    protected $guarded = [];
    
    function categories(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}
