<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizUser extends Model
{
    protected $fillable = [
        'quiz_id',
        'guest_user_id',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function guestUser(): BelongsTo
    {
        return $this->belongsTo(GuestUser::class);
    }
}
