<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $questions = $user->questions()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'questions' => $questions,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    public function favorites($id)
    {
        $question = User::find($id);
        $favorites = $question->favorites()->paginate(10);

        $data = [
            'user' => $question,
            'users' => $favorites,
        ];

        $data += $this->counts($question);

        return view('users.favorites', $data);
    }
}