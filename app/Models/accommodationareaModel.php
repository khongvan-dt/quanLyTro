<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accommodationareaModel extends Model
{
    protected $table = 'accommodationArea';

    protected $fillable = [
        'idUser',
        'city',
        'districts',
        'wardsCommunes',
        'streetAddress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
}
