<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'surveys';
    protected $fillable = ['name','objective','link','status','start_date','end_date'];
    protected $hidden = [];
    public function AssignedSurvey()
    {
        return $this->hasMany('App\Models\AssignedSurvey','survey_id');
    }
}
