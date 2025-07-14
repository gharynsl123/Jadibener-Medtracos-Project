<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $table = 'estimate';
    protected $guarded = [];

    function categories()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    function parts()
    {
        return $this->belongsTo('App\Part', 'parts_id');
    }
    function Equipments() {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }

    function instansi(){
        return $this->belongsTo('App\Instansi', 'id_instansi');
    }
}
