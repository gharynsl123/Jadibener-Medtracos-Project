<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table ='submissions';
    protected $guarded = [];

    function equipments() {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class, 'submissions_id', 'id');
    }

    function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
