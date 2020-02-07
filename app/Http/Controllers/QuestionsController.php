<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Questio;
use App\Category;

class QuestionsController extends Controller
{

    
    public function create()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $question = new \App\Question;
            
            $categories = \App\Category::all();
            //dd($categories);
            $data = [
                'user' => $user,
                'question' => $question,
                'categories' => $categories,
            ];
        }
        
        return view('questions.editor', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:5000',
            'title' => 'required|max:191',
            'category' => 'numeric',
        ]);
        $request->user()->questions()->create([
            'content' => $request->content,
            'title' => $request->title,
            'category_id' => $request->category,
        ]);
        return back();
    }
    public function show($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $question = \App\Question::find($id);
            $answers = \App\Answer::where('question_id', $question->id)->orderBy('created_at', 'asc')->get();
            $data = [
                'user' => $user,
                'question' => $question,
                'answers' => $answers,
            ];
            //dd($question->mark_body);
        }
        return view('questions.show', $data);
    }
    
    public function category()
    {
        $user = \Auth::user();
        $data = [];

        $categories = \App\Category::all()->sortBy('display_order');
        $data = [
            'categories' => $categories,
            'user' => $user,
        ];
        //dd($data);
        return view('category.show', $data);
    }
}