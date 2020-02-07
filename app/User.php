<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    public function feed_questions()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Question::whereIn('user_id', $follow_user_ids);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Question::class, 'favorites', 'user_id', 'question_id')->withTimestamps();
    }
    public function is_favorites($questionId)
    {
        return $this->favorites()->where('question_id', $questionId)->exists();
    }
    

    public function favorite($questionId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favorites($questionId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $questionId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->favorites()->attach($questionId);
            return true;
        }
    }
    public function unfavorite($questionId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favorites($quesitonId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $questionId;
    
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->favorites()->detach($questionId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //category follow
    //Followしたカテゴリ取得
    public function category_followings()
    {
        return $this->belongsToMany(Category::class, 'category_follow', 'user_id', 'category_id')->withTimestamps();
    }
    //フォローしているカテゴリか判定,exists(DBの存在チェック)
    public function is_category_followed($categoryId)
    {
        return $this->favorites()->where('category_id', $categoryId)->exists();
    }
    
    //Categoryをフォローする
    public function category_follow($categoryId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_category_followed($categoryId);

        if ($exist) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->category_followings()->attach($categoryId);
            return true;
        }
    }
    public function category_unfollow($categoryId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favorites($categoryId);

        if ($exist) {
            // 既にフォローしていればフォローを外す
            $this->category_followings()->detach($categoryId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
}
