<?php
namespace App\SMS;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ExcelModel implements ToModel, WithHeadingRow, WithUpserts
{
    public function model(array $row)
    {
        // dd($row);
        return new Client([
            'hiv_clinic_no' => $row['hiv_clinic_no'],
            'family_name' => $row['family_name'],
            'given_name' => $row['given'],
            'gender' => $row['gender'],
            'hiv_viral_load_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['hiv_viral_load_date'])->format('Y-m-d'),
            'return_visit_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['return_visit_date'])->format('Y-m-d'),
            'telephone_number' => $row['telephone_number'],
            'care_giver_telephone_number' => $row['care_givers_telephone_number'],
        ]);
    }

    /**
    * @return string|array
    */
    public function uniqueBy()
    {
        return 'hiv_clinic_no';
    }
}
