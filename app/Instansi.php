<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $guarded = [];
    
    public function users()
    {
        return $this->hasMany(User::class, 'id_instansi');
    }

}
