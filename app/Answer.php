<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use cebe\markdown\Markdown as Markdown;

class Answer extends Model
{
    protected $fillable = ['content', 'user_id', 'question_id', 'content', 'parent_answer_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    public function parse() {
        $parser = new Markdown();
        return $parser->parse($this->content);
    }

    public function getMarkBodyAnswerAttribute() {
        return $this->parse();
    }
}
