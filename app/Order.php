<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'order_id';
    protected $fillable = [
     	'fk_client_id',
     	'order_date',
     	'due_date',
     	'shipment_method',
     	'ship_date',
     	'invoice_number',
     	'quantity',
     	'notes',
     	
     ];

    public function client_orders($value='')
    {
        return $this->belongsTo('App\Client','fk_client_id', 'client_id')->withDefault([
            null
        ]);
    }

    public function order_productions($value='')
    {
        return $this->hasMany('App\Production','fk_order_id', 'order_id');
    }
}
