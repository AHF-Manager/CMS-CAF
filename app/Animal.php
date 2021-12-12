<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function animalinfo()
    {
        return $this->hasOne(Animalinfo::class);
    }

}
