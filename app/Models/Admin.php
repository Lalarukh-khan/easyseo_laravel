<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes, DianujHashidsTrait, Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'firstname', 'lastname', 'mobile_no', 'image', 'usertype', 'is_verify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }

    public function user_emails()
    {
        return $this->has_many('App\Models\UsersEmail', 'user_id')->where('user_type', 'admin');
    }

    public function getIsAdminAttribute()
    {
        return $this->user_type == 'admin';
    }

    public function scopeNotifiableAdmins()
    {
        return $this->where('user_type', 'admin')->get();
    }
}
