<?php

namespace App\Exports;

use App\Animalinfo;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnimalinfosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Animalinfo::all();
    }
}
