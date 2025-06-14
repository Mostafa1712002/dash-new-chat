<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, Translatable;

    protected $guarded = [
        'id'
    ];

    protected $wth = 'translations';

    protected $translatedAttributes = [
        'name',
        'full_name',
    ];



    public function translations()
    {
        return $this->hasMany(CountryTranslation::class);
    }
}
