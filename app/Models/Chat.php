<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $fillable = ['sender_id','receiver_id','contents','send_date','received_date','status'];
    protected $hidden = [];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
