<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcelHistory extends Model
{
    protected $fiilable = [
        'parcel_id',
        'status',
        'created_by',
        'operation_type',
    ];
    public function parcel()
    {
        return $this->belongsTo(Parcel::class);
    }
}
