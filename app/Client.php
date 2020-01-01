<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'client_id';
    protected $fillable = [
     	'client_name',
     	'client_logo',
     	'email',
     	'phone',
     ];
}
