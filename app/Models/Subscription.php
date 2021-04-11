<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_paid',
        'amount',
        'start_date',
        'end_date',
        'observation',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
