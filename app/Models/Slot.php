<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slot extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name','state','note'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'state' => 'boolean'
    ];

    public function scopeActive($q)
    {
        return $q->where('state',true);
    }

    /**
     * @return HasMany
     */
    public function times(): HasMany
    {
        return $this->hasMany(SlotTime::class);
    }

    public function users(): BelongsToMany
    {
        return $this->hasMany(Student::class);
    }


}
