<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemplateCategory extends Model
{
    use HasFactory, SoftDeletes , DianujHashidsTrait;

    public function templates()
    {
        return $this->hasMany(Template::class,'category_id','id')->where('status',1);
    }
}
