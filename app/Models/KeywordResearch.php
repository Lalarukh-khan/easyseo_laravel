<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeywordResearch extends Model
{
    use HasFactory, SoftDeletes, DianujHashidsTrait;

    public function country()
    {
        return $this->belongsTo(Country::class,'country_code','location_code');
    }

    public function suggestions()
    {
        return $this->hasMany(KeywordSuggestion::class,'keyword_id','id');
    }
}
