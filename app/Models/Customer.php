<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer  extends Authenticatable
{
    use Notifiable , SoftDeletes;

    protected $fillable = [
        'ful_name',
        'email',
        'password',
        'phone_number',
        'image',
        'address',
        'country',
        'city',
        'latitude',
        'longitude',
    ];
}
