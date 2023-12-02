<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pathModel extends Model
{
    use HasFactory;
    protected $table = 'path';

    protected $fillable = [
        'id',
        'path',
        'idUser'
    ];

}
