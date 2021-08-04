<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name' ,'email', 'password','gender','telephone','district1','country','district2','district3','education','fields','confirmed','activated'
        ,'photo','date','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function AssignedSurvey()
    {
        return $this->hasMany('App\Models\AssignedSurvey','user_id');
    }
    public function Chat()
    {
        return $this->hasMany('App\Models\Chat','sender_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
