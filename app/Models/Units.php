<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Units extends Model
{
    protected $fillable = [
        'id',
        'unit_name',
        'restaurant_id'
    ];
}
