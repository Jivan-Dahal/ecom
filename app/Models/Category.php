<?php

namespace App\Models;

use App\Http\Controllers\Backend\FoodController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function food(){
        return $this->hasMany(food::class);
    }

}
