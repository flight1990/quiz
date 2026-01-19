<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionAttend extends Model
{
    protected $fillable = [
        'question_id',
        'guest_user_id',
        'attempt',
    ];

    public function statuses(): HasMany
    {
        return $this->hasMany(QuestionAttendStatus::class, 'question_attend_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function guestUser(): BelongsTo
    {
        return $this->belongsTo(GuestUser::class);
    }
}
