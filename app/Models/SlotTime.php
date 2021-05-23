<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SlotTime extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'day','morning_start_at',
        'morning_end_at','slot_id',
        'after_noon_start_at','after_noon_end_at','note'
    ];



    /**
     * @return BelongsTo
     */
    public function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }
}
