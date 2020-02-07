<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

class AnswersController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content*' => 'required|max:5000',
            'question_id' => 'required|max:191',
            'parent_answer_id' => 'required|max:191',
        ]);

        $attr = "content" . $request->answer_id;
        
        $image_check = $request->file('image');
        if (null !== $image_check) {
            $form = $request->all();
    
            //s3アップロード開始
            $image = $request->file('image');
            // バケットの`myprefix`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            // アップロードした画像のフルパスを取得
            $image_path = Storage::disk('s3')->url($path);
        
            $request->user()->answers()->create([
                'image_path' => $image_path,
                'content' => $request->{$attr},
                'question_id' => $request->question_id,
                'parent_answer_id' => $request->parent_answer_id,
            ]);
        }else{
            $request->user()->answers()->create([
                'content' => $request->{$attr},
                'question_id' => $request->question_id,
                'parent_answer_id' => $request->parent_answer_id,
            ]); 
        }
        return back();
    }
}
