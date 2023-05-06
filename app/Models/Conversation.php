<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use HasFactory, SoftDeletes;

    // protected $appends = ['created_diff'];

    // public function getCreatedAtAttribute($value)
    // {
    //     return $this->created_at->diffForHumans();
    // }

    /**
     * Get the user associated with the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user1_id');
    }
    /**
     * Get the user associated with the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function restaurant(): HasOne
    {
        return $this->hasOne(Restaurant::class, 'id', 'user2_id');
    }
}
