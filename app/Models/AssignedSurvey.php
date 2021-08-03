<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedSurvey extends Model
{
    use HasFactory;
    protected $table = 'assigned_surveys';
    protected $fillable = ['survey_id','user_id','status','date'];
    protected $hidden = [];
    public function Survey()
    {
        return $this->belongsTo('App\Models\Survey');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
