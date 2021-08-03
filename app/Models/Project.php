<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['subcategory_id','name','code','client','objective','cost','size'];
    protected $hidden = [];
    public function File()
    {
        return $this->hasMany('App\Models\File','project_id');
    }
    public function Subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
