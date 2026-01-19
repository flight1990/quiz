<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionAttendStatus extends Model
{
    protected $fillable = [
        'question_attend_id',
        'status',
    ];

    public function attend(): BelongsTo
    {
        return $this->belongsTo(QuestionAttend::class, 'question_attend_id');
    }
}
