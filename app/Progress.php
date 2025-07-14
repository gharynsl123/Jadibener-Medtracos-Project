<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progress';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function instansi()
    {
        return $this->belongsTo('App\instansi', 'id_instansi');
    }
    
    function submissions() {
        return $this->belongsTo('App\Submission', 'submissions_id');
    }


    public function histories()
    {
        return $this->hasMany(History::class, 'id_progress');
    }
}
