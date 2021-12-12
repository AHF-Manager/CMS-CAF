<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animalinfo extends Model
{
    public $timestamps = false;
    protected $fillable = ['sr_no','ai_date','group_id','group_name','death_details','treatment_details','organs_hp','blood_collection','total_animals','total_groups','remarks','animal_id'];
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
