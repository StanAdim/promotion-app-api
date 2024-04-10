<?php

namespace App\Models\Sido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class BusinessProfile extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'applicationCode',
        'isFilled',
        'background',
        'marketProblem',
        'marketBase',
        'prototypeDescription',
        'marketSize',
    ];
    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
