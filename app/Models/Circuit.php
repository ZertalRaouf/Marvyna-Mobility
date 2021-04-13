<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'create_date',
        'from_date',
        'direction',
        'observation',
        'driver_id',
        'vehicule_id'
    ];
}
