<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $questions = \App\Question::orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'questions' => $questions,
            ];
        }
        return view('welcome', $data);
    }
    public function new()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $questions = \App\Question::orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'questions' => $questions,
            ];
        }
        return view('welcome', $data);
    }
    public function follow()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $questions = $user->feed_questions()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'questions' => $questions,
            ];
        }
        return view('welcome', $data);
    }
}
