<?php

namespace Modules\Question\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Question\Models\Answer;
use Modules\User\Models\User;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = [];
    protected $casts = [];
    protected $with = [
        'answers'
    ];

    public function getWhomAttribute($value)
    {
        return \App\Enums\QuestionEnum::whom($value);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function maker()
    {
        return $this->belongsTo(User::class);
    }
}
