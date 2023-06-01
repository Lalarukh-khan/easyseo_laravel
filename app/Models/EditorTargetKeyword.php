<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EditorTargetKeyword extends Model
{
    use HasFactory,SoftDeletes;

	protected $table = 'editor_target_keyword';

	public $fillable = ['name', 'editor_id'];
}
