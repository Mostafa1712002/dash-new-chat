<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookConversation extends Model
{

    protected $table = 'facebook_conversations';


    protected $guarded = [
        'id'
    ];

    public function messages()
    {
        return $this->hasMany(FacebookMessage::class, 'conversation_id', 'conversation_id');
    }


    public function page()
    {
        return $this->belongsTo(FacebookPage::class, 'page_id', 'page_id');
    }
}
