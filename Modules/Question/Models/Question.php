<?php

namespace Modules\Question\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Question\Models\Answer;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'questionable_type',
        'questionable_id'
    ];

    protected $with = [
        // 'questionable:id,username,first_name,last_name,photo,is_verified',
        'answers'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function questionable()
    {
        return $this->morphTo();
    }
    
    protected static function newFactory()
    {
        return \Modules\Question\Database\factories\QuestionFactory::new();
    }
}
