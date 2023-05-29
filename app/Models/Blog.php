<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes, DianujHashidsTrait;

    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'category_id')->orWhere('deleted_at','!=',null);
    }
}
