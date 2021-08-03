<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $fillable = ['device_name','device_brand','device_model','device_serialNo','device_imei1','device_imei2','member_id','received_date','returned_date'];
    public function Member()
    {
        return $this->belongsTo('App\Models\User');
    }
}
