<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $primaryKey = 'id_question';

    public function getQuestionsIdAttribute()
    {
        return [
            'id' => $this->id_question,
            'question' => $this->question
        ];
    }
}
