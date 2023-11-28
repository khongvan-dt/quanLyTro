<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contractModel extends Model
{
    use HasFactory;
    protected $table = 'contract'; 

    protected $fillable = [
        'idUser',
        'idRoomContract',
        'imgContract',
        'startDate',
        'endDate',
    ];
}
