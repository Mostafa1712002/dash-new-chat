<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Team extends Model
{
    use Translatable;

    protected $fillable = ['name', 'user_id'];
    public $translatedAttributes = ['name', 'attachments'];

    protected $appends = ['count_newmuslims', 'team_leader'];

    public function interlocutors()
    {
        return $this->hasMany(Interlocutor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCountNewmuslimsAttribute()
    {
        return $this->interlocutors->sum('count_new_muslims');
    }

    public function getTeamLeaderAttribute()
    {
        return optional($this->user)->first_name . ' ' . optional($this->user)->last_name;
    }
}
