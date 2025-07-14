<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $guarded = [];

    function equipments() {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }
    
    function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    function instansi() {
        return $this->belongsTo('App\Instansi', 'id_instansi');
    }
}
