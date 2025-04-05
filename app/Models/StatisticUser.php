<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatisticUser extends Model
{
    protected $fillable = [
        'user_id',
        'total_parcels_sent',
        'total_rewards',
        'last_activity',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
