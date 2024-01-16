<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $casts = [
    //     'food' => 'array',
    // ];
    public function user(){
        return $this->belongsTo(User::class);

    }
    public function food(){
        return $this->belongsTo(food::class);

    }
    use HasFactory;
}
