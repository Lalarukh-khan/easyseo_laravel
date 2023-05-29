<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory,SoftDeletes,DianujHashidsTrait;

    public function category()
    {
        return $this->belongsTo(TemplateCategory::class,'category_id');
    }

    public function fields()
    {
        return $this->hasMany(TemplateField::class,'template_id','id');
    }

    public function setting()
    {
        return $this->belongsTo(TemplateSetting::class,'id','template_id');
    }

    public function added_by()
    {
        return $this->belongsTo(Admin::class,'added_by_id');
    }
}
