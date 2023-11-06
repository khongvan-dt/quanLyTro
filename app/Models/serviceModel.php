<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceModel extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'user_id',
        'electricityBill',
        'waterBill',
        'wifiFee',
        'cleaningFee',
        'parkingFee',
        'fine',
        'other_fees',
        'sumServices',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
