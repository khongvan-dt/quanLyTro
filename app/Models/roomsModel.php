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
        'idTotalFloors',
        'idNumberFloors',
        'idserviceFeeSummary',
        'idServices',
        'roomName',
        'priceRoom',
        'interior',
        'capacity',
    ];
}
