<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomsModel extends Model
{
    protected $table = 'room';

    protected $fillable = [
        'user_id',
        'idAccommodationArea',
        'idNumberFloors',
        'idServices',
        'idServiceFeeSummary',
        'roomName',
        'priceRoom',
        'interior',
        'capacity',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
