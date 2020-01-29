<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $questions = $user->questions()->orderBy('created_at', 'desc')->paginate(10);

            $questions = \App\Question::paginate(10);
            $data = [
                'user' => $user,
                'questions' => $questions,
            ];
        }
        
        return view('welcome', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->questions()->create([
            'content' => $request->content,
        ]);

        return back();
    }
    public function destroy($id)
    {
        $question = \App\Question::find($id);

        if (\Auth::id() === $question->user_id) {
            $question->delete();
        }

        return back();
    }
}