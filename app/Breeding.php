<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breeding extends Model
{
    public $timestamps = false;
    protected $fillable = ['breed','start','male_id','female_id','seperate','delivery','del_male','del_female','tot','weaning','pup_male','pup_female','m_male','m_female','total'];
}
