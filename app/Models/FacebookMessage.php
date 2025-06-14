<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class FacebookMessage extends Model
{


    protected $table = 'facebook_messages';

    protected $fillable = [
        'message_id',
        'message',
        'from',
        'to',
        'attachments',
        'tags',
        'sticker',
        'shares',
        'created_time',
        'conversation_id',  
    ];



    public function conversation()
    {
        return $this->belongsTo(FacebookConversation::class,'conversation_id');
    }

}
