<?php

namespace App;
use App\ActivityLog;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    function categories(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    function brands() {
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    protected static function boot() {
        parent::boot();

        static::created(function ($model) {
            ActivityLog::create([
                'action' => 'created',
                'model' => get_class($model),
                'model_id' => $model->id,
                'user_id' => Auth::user()->id,
                'changes' => json_encode($model->toArray())
            ]);
        });

        static::updated(function ($model) {
            ActivityLog::create([
                'action' => 'updated',
                'model' => get_class($model),
                'model_id' => $model->id,
                'user_id' => Auth::user()->id,
                'changes' => json_encode($model->getChanges())
            ]);
        });

        static::deleted(function ($model) {
            ActivityLog::create([
                'action' => 'deleted',
                'model' => get_class($model),
                'model_id' => $model->id,
                'user_id' => Auth::user()->id,
                'changes' => json_encode($model->toArray())
            ]);
        });
    }
}
