<?php

namespace Modules\Question\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Doctor\Models\Doctor;

class Answer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['doctor_id', 'question_id'];

    protected $with = [
        'doctor:id,username,first_name,last_name,photo,is_verified'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\Question\Database\factories\AnswerFactory::new();
    }
}
