<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model implements AuthenticatableContract
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
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
