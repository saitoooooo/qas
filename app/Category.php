<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'display_order'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function followed_users()
    {
        return $this->belongsToMany(User::class, 'category_follow', 'category_id', 'user_id')->withTimestamps();
    }
}
