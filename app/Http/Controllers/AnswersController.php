<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->answers()->create([
            'content' => $request->content,
        ]);
        return back();
    }
}
