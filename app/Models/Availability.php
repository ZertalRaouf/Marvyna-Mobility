<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 'from', 'to', 'reason', 'note','driver_id'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
