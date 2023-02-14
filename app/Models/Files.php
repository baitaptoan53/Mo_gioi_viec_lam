<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'link',
        'type',
    ];
    // timestamp
    public $timestamps = false;
}
