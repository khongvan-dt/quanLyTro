<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenantModel extends Model
{
    use HasFactory;
    protected $table = 'tenant';

    protected $fillable = [
        'idUser',
        'idRoomTenant',
        'residentName',
        'email'
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }

  
}
