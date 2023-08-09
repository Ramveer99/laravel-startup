<?php

namespace App\Imports;

use App\Models\team;
use Maatwebsite\Excel\Concerns\ToModel;

class Userimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new team([
            'id' => $row[0],
            'name' => $row[1],
            'department' => $row[2],
            'photo' => $row[3],
            'created_at'=>$row[4],
            'updated_at'=>$row[5],
            'is_user'=>$row[6],

        ]);
    }
}
