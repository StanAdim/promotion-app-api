<?php

namespace App\Models\Sido;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Projection extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'expectedRevenue',
        'machineEquipment', //array
        'workingCapital',
        'investmentPlan',
        'financingSource',
        'challenges', //array
        'supportNeeded', 
        'applicationCode', 
        'isFilled',
    ];
    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
