<?php

namespace App\Exports;

use App\Breeding;
use Maatwebsite\Excel\Concerns\FromCollection;

class BreedingsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Breeding::all();
    }
}
