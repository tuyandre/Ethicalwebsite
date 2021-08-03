<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceTrace extends Model
{
    use HasFactory;
    protected $table = 'device_traces';
    protected $fillable = ['device_id','member_id','received_date','returned_date'];
    public function Member()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Device()
    {
        return $this->belongsTo('App\Models\Device');
    }
}
