<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait DianujHashidsTrait
{
    public function getHashIdAttribute()
    {
        return hashids_encode($this->getKey());
    }
    
    public function scopeWhereHashid(Builder $query, $id){
        $id = hashids_decode($id);
        return $query->where('id', $id);
    }

    public function scopeHashidFind(Builder $query, $id){
        $id = hashids_decode($id);
        return $query->find($id);
    }

    public function scopeHashIdOrFail(Builder $query, $id)
    {
        $id = hashids_decode($id);
        return $query->findOrFail($id);
    }

    public function scopeWhereInHashIds(Builder $query, $ids)
    {   
        $ids = array_map(function ($id){
            return hashids_decode($id);
        }, $ids);
        return $query->whereIn('id', $ids);
    }

}