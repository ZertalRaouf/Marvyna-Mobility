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

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function vehicule(){
        return $this->belongsTo(Vehicule::class);
    }
}
