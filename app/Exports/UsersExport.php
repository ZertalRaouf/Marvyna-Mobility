<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function map($row): array{
        $fields = [
            $row->name,
            $row->email,
            $row->phone,
            $row->mobile,
            $row->address,
            $row->observation,
        ];
        return $fields;
    }

    public function headings(): array
    {
        $headings = [
            "Nom",
            "Email",
            "Num de téléphone",
            "Num de mobile",
            "Adress",
            "Observation"
        ];
        return $headings;
    }
}
