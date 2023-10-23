<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalFlorModel extends Model
{
    
    protected $table = 'totalfloors';

    protected $fillable = [
        'idUser',
        'sumFloors',
    ];

}
