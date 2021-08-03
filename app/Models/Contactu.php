<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactu extends Model
{
    use HasFactory;
    protected $table = 'contactus';
    protected $fillable = ['subcategory_id','name','email','phone','message'];
    protected $hidden = [];
    public function Subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
