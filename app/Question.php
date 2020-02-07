<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use cebe\markdown\Markdown as Markdown;

class Question extends Model
{
    protected $fillable = ['content', 'user_id', 'title','category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    } 
    
    public function favorite_users()
    {
        return $this->belongsToMany(Question::class, 'favorites', 'question_id', 'user_id')->withTimestamps();
    }
    
    public function parse() {
        $parser = new Markdown();
        return $parser->parse($this->content);
    }

    public function getMarkBodyAttribute() {
        return $this->parse();
    }
}
