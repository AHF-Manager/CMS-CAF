<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Dailyact extends Model
{
    use HasApiTokens;
    public $timestamps = false;
    protected $fillable = ['dct_date','day','count','activity','phase','sr_no','iaec_no','details','short_title'];
}
