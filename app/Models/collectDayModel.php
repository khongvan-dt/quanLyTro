<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collectDayModel extends Model
{
    protected $table = 'collectDay';

    protected $fillable = [
        'id',
        'idUser',
        'idRoomcollectDay',
        'day',
       
    ];
}
