<?php

namespace App\Exports;

use App\Dailyact;
use Maatwebsite\Excel\Concerns\FromCollection;

class DailyactsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dailyact::all();
    }
}
