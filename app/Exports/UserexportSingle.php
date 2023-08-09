<?php
// UserExport.php

namespace App\Exports;

use App\Models\team;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserexportSingle implements FromQuery, WithHeadings
{
    use Exportable;

    protected $userId;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query()
    {
        // Fetch data of the specific user based on the ID
        return team::query()->where('id', $this->id);
    }

    public function headings(): array
    {
        // Return the column headings for the export
        return [
            'ID',
            'subject',
            'department',
            // Add more columns here as needed
        ];
    }
}
