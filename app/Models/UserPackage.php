<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPackage extends Model
{
    use HasFactory, SoftDeletes, DianujHashidsTrait;

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function monthly_packs()
    {
        return $this->hasMany(MonthlyPack::class,'user_package_id','id');
    }
}
