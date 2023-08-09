<?php

namespace App\Exports;

use App\Models\team;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;

class Userexport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return team::all();
    }
    // public function collectionid(Request $req, $id)
    // {
    //     dd($id);
    // }

    
}
