<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $guarded = [];

    function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }

    function equipments() {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }

    function submissions() {
        return $this->belongsTo('App\Submission', 'submissions_id');
    }

    function progress() {
        return $this->belongsTo('App\Progress', 'id_progress');
    }

    function estimation() {
        return $this->belongsTo('App\Estimate', 'estimate_id');
    }

    function booking() {
        return $this->belongsTo('App\Booking', 'booking_id');
    }

}
