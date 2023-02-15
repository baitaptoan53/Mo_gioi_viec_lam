<?php

namespace App\Models;

use App\Enums\FileTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Posts extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'job_title',
        'city',
        'status',
    ];
    // slugable dùng để tạo slug từ job_title
    function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_title'
            ]
        ];
    }
    public function getCurrencySalaryCodeArtibute()
    {
        return PostCurrencySalaryEnum::getKey($this->currency_salary);
    }
    public function getStatusNameAttribute() 
    {
        return PostStatusEnum::getKey($this->status);
    }
}
