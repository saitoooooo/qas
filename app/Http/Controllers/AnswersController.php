<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'question_id' => 'required|max:191',
            'parent_answer_id' => 'required|max:191',
        ]);


        $request->user()->answers()->create([
            'content' => $request->content,
            'question_id' => $request->question_id,
            'parent_answer_id' => $request->parent_answer_id,
        ]);
        return back();
    }
}
