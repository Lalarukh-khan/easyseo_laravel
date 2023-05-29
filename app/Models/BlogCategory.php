<?php

namespace App\Models;
use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes, DianujHashidsTrait;
    protected $table = 'blog_category';

    public function blogs()
    {
        return $this->hasMany(Blog::class,'category_id','id');
    }
}
