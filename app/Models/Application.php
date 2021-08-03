<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $fillable = ['name','email','sex','post','contents','documents','date','filename'];
    protected $hidden = [];
}
