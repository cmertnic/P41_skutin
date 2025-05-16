<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'type',
        'payment',
        'adress',
        'status_id', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statue() 
    {
        return $this->belongsTo(Order::class, 'status_id'); 
    }      
    
}
