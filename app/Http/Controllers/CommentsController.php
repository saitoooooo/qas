<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'answer_id' => 'required|max:191',
        ]);

        $request->user()->comments()->create([
            'content' => $request->content,
            'answer_id' => $request->answer_id,
        ]);
        return back();
    }
}
