<?php

namespace App\Imports;

use App\Animalinfo;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class AnimalinfosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDateTime(string $value, string $format = 'Y-m-d')
    {   
        try {
                return Carbon::instance(Date::excelToDateTimeObject($value))->format($format);
            } catch (\ErrorException $e) {
                return Carbon::createFromFormat($format, $value);
            }
        }

    public function model(array $row)
    {
        return new Animalinfo([
            'sr_no'=> $row[1],
            'ai_date'=> $this->transformDateTime($row[2]),
            'group_id'=> $row[3],
            'group_name'=> $row[4],
            'death_details'=> $row[5],
            'treatment_details'=> $row[6],
            'organs_hp'=> $row[7],
            'blood_collection'=> $row[8],
            'total_animals'=> $row[9],
            'total_groups'=> $row[10],
            'remarks'=> $row[11],
            'animal_id'=> $row[12],

        ]);
    }
}
