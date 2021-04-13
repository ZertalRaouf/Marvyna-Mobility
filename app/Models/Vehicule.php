<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'matriculation',
        'matriculation_date',
        'first_circulation_date',
        'is_rentable',
        'brand',
        'model',
        'motorization',
        'fuel',
        'color',
        'number_of_places',
        'tax_horses',
        'serial_number',
        'initial_number_of_km',
        'mode_of_aquisition',
        'key_double_location',
        'photos',
        'observation'
    ];
}
