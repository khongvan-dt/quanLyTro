<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceFeeSummaryModel extends Model
{
    protected $table = 'serviceFeeSummary';

    protected $fillable = [
        'idUser',
        'name',
    ];
}
