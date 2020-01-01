<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $primaryKey = 'production_id';
    protected $fillable = [
     	'fk_order_id',
     	'logo_title',
     	'production_logo',
     	'sc',
     	'location',
    ];

    public function production_thread($value='')
    {
        return $this->belongsToMany('App\Thread', 'production_thread', 'fk_production_id', 'fk_thread_id');
    }
}




