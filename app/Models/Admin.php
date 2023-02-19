<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    // use HasFactory;
    use HasFactory,HasApiTokens,Notifiable;
    // protected $guard = 'admin';
}
