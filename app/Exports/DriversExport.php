<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DriversExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Driver::all();
    }

    public function map($row): array{
        $fields = [
            $row->first_name,
            $row->last_name,
            $row->email,
            $row->phone,
            $row->mobile,
            $row->address,
            $row->birth_date,
            $row->nationality,
            $row->place_of_birth,
            $row->security_number,
            $row->licence_number,
            $row->licence_expiration_date,
            $row->observation,
        ];
        return $fields;
    }

    public function headings(): array
    {
        $headings = [
            "Prenom",
            "Nom",
            "Email",
            "Num de tel",
            "Num de mobile",
            "Adress",
            "Date de naissance",
            "Nationalité",
            "Endroit de naissance",
            "Num de securité",
            "Num de licence",
            "Date d'expiration de la licence",
            "Observation",
        ];
        return $headings;
    }
}
