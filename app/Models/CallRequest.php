<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallRequest extends Model
{
    use HasFactory;
    protected $table = 'call_requests';
    protected $fillable = ['subcategory_id','name','email','phone','date','message'];
    protected $hidden = [];
    public function Subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }
}
