<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'user_products')->withPivot(['quantity', 'amount', 'id']);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


}