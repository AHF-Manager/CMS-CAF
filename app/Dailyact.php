<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dailyact extends Model
{
    public $timestamps = false;
    protected $fillable = ['dct_date','day','count','activity','phase','sr_no','iaec_no','details','short_title'];
}
