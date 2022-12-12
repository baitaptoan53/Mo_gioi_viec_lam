<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use Authenticatable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
