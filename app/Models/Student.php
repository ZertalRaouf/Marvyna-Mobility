<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'civility',
        'first_name',
        'last_name',
        'birth_date',
        'enter_date',
        'leave_date',
        'photo',
        'observation',
        'specificity',
        'disability',
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function establishments(){
        return $this->belongsToMany(Establishment::class)->withTimestamps();
    }

    public function circuits(){
        return $this->belongsToMany(Circuit::class)->withTimestamps();
    }

    protected $appends = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : asset('assets/admin/dist/img/user1-128x128.jpg');
    }
}
