<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function map($row): array{
        $fields = [
            $row->first_name,
            $row->last_name,
            $row->birth_date,
            $row->enter_date,
            $row->leave_date,
            $row->observation,
            $row->specificity,
            $row->disability,
        ];
        return $fields;
    }

    public function headings(): array
    {
        $headings = [
            "Prenom",
            "Nom",
            "Date de naissance",
            "Date d'entré'",
            "Date de sortie",
            "Observation",
            "Specification",
            "Disability"
        ];
        return $headings;
    }
}
