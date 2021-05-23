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
        return Student::with(['users:id,first_name,last_name,phone'])->get();
    }

    public function map($row): array{

        $parent = $row->users->first();

          $fields = [
            $row->last_name,
            $row->first_name,
            $row->birth_date,
            $row->enter_date,
            $row->leave_date,
            $row->observation,
            $row->specificity,
            $row->disability,
              $parent? $parent->first_name.' '.$parent->last_name : '/',
              $parent? $parent->phone : '/',
        ];
        return $fields;
    }

    public function headings(): array
    {
        $headings = [
            "Nom",
            "Prénom",
            "Date de naissance",
            "Date d'entrée'",
            "Date de sortie",
            "Observation",
            "Specification",
            "Disability",
            "Parent",
            "Numéro de téléphone du parent"
        ];
        return $headings;
    }
}
