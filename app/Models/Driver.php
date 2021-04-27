<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'civility',
        'first_name',
        'last_name',
        'address',
        'phone',
        'mobile',
        'email',
        'password',
        'birth_date',
        'nationality',
        'place_of_birth',
        'security_number',
        'photo',
        'licence_number',
        'licence_expiration_date',
        'licence_photo',
        'is_available',
        'observation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function circuits(){
        return $this->hasMany(Circuit::class);
    }
}
