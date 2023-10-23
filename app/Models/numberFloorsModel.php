<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class numberFloorsModel extends Model
{
   
    protected $table = 'numberfloors';

    protected $fillable = [
        'idUser',
        'idTotalFloors',
        'floors',
    ];
}
