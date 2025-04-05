<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parcel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'receiver_name',
        'receiver_address',
        'receiver_phone_number',
        'tracking_number',
        'cost',
        'weight',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parcelsHistory()
    {
        return $this->hasMany(ParcelHistory::class);
    }
}
