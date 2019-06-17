<?php

namespace App\Imports;

use App\Models\Location\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CountryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Country([
            'name' => $row['name'],
            'code' => $row['code'],
            'two_letter_iso_code' => $row['two_letter_iso_code'],
            'three_letter_iso_code' => $row['three_letter_iso_code'],
            'nationality' => $row['nationality'],
        ]);
    }
}
