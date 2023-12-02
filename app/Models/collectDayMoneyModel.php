<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collectDayMoneyModel extends Model
{
    protected $table = 'collectmoney';

    protected $fillable = [
        'id',
        'idUser',
        'idRoomCollectMoney',
        'time',
       
    ];
}
