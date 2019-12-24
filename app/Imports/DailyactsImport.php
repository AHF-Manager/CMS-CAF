<?php

namespace App\Imports;

use App\Dailyact;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;


class DailyactsImport implements ToModel
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
        return new Dailyact([
            'dct_date'=> $this->transformDateTime($row[1]),
            'day' => $row[2],
            'count' => $row[3],
            'activity' => $row[4],
            'phase' => $row[5],
            'sr_no' => $row[6],
            'iaec_no' => $row[7],
            'details' => $row[8],
            'short_title' => $row[9],
        
    

        ]);
    }

    }