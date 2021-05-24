<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'observation',
        'longitude',
        'latitude'
    ];

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
