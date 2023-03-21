<?php

namespace Modules\Question\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Models\User;
use Modules\Question\Models\Question;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['doctor_id', 'question_id'];

    protected $with = [
        'doctor:id,username,first_name,last_name,photo,account_verified_at'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected static function newFactory()
    {
        return \Modules\Question\Database\factories\AnswerFactory::new();
    }
}
