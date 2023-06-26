<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyPack extends Model
{
    use HasFactory, SoftDeletes, DianujHashidsTrait;

    protected $guarded = [];

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }

    public function user_package()
    {
        return $this->belongsTo(UserPackage::class,'user_package_id');
    }
}
