<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $guarded = [];


    function Equipments() {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }
    
    public function instansi()
    {
        return $this->belongsTo('App\Instansi', 'id_instansi');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
