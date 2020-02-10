<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'species',
        'st_date',
        'ob_m'   ,
        'ob_f'   ,
        'ob_t'   ,
        're_m'   ,
        're_f'   ,
        'is_m'   ,
        'is_f'   ,
        'mt_m'   ,
        'mt_f'   ,
        'cb_m'   ,
        'cb_f'   ,
        'cb_t'   ,
        'remarks'
    ];
}
