<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    Public function category(){
        return $this->belongsTo(category::class,'cid');
    }

    public function users(){
        return $this->belongsToMany(User::class,'user_products');
    }
}
