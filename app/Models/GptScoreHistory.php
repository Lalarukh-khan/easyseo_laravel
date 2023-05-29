<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GptScoreHistory extends Model
{
    use HasFactory,SoftDeletes;

	protected $table = 'gpt_score_histories';

	public $fillable = ['temp_id', 'score'];
}
