<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'circuit_id'
    ];

    public function circuit(){
        return $this->belongsTo(Circuit::class);
    }
}
