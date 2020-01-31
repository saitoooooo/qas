<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{

    
    public function create()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $question = new \App\Question;

            $data = [
                'user' => $user,
                'question' => $question,
            ];
        }
        
        return view('questions.editor', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'title' => 'required|max:191',
        ]);

        $request->user()->questions()->create([
            'content' => $request->content,
            'title' => $request->title,
        ]);

        return back();
    }
    public function show($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $question = \App\Question::find($id);
            $answers = \App\Answer::where('question_id', $question->id)->orderBy('created_at', 'desc')->get();

            $data = [
                'user' => $user,
                'question' => $question,
                'answers' => $answers,
            ];
        }
        
        return view('questions.show', $data);
    }
}