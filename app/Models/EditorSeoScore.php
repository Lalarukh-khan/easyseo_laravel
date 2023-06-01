<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EditorSeoScore extends Model
{
    use HasFactory,SoftDeletes;

	protected $table = 'editor_seo_score';

	public $fillable = ['score', 'editor_id'];
}
