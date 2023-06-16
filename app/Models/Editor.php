<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Editor extends Model
{
    use HasFactory,SoftDeletes;

	protected $table = 'editor';

	public $fillable = ['user_id', 'name', 'description', 'score', 'target_keyword', 'semantics', 'questions','words', 'status'];
}
