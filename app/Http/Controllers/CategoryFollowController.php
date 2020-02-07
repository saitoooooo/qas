<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryFollowController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->category_follow($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->category_unfollow($id);
        return back();
    }
}
