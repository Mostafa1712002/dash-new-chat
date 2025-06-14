<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    use HasFactory;

    protected $table = 'country_translations';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * {@inheritDoc}
     */
    protected $guarded = [
        'id',
    ];


}
