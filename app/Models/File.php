<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = ['project_id','name'];
    protected $hidden = [];

    public function Project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
