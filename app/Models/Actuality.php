<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'is_visible'
    ];

    protected $appends = [
        'image_url'
    ];

    public function getImageUrlAttribute()
    {

        return $this->image ? asset('storage/'.$this->image) : asset('assets/admin/dist/img/user1-128x128.jpg');
    }
}
