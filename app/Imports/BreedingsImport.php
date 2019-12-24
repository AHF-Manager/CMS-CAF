<?php

namespace App\Imports;

use App\Breeding;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class BreedingsImport implements ToModel
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
        return new Breeding([
            'breed'=> $row[1],
            'start'=> $this->transformDateTime($row[2]),
            'male_id'=> $row[3],
            'female_id'=> $row[4],
            'seperate'=> $this->transformDateTime($row[5]),
            'delivery'=> $this->transformDateTime($row[6]),
            'del_male'=> $row[7],
            'del_female'=> $row[8],
            'tot'=> $row[9],
            'weaning'=> $this->transformDateTime($row[10]),
            'pup_male'=> $row[11],
            'pup_female'=> $row[12],
            'm_male'=> $row[13],
            'm_female'=> $row[14],
            'total'=> $row[15],

        ]);
    }
}
