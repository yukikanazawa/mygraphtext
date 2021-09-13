<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(subject $subject, Field $field, category $category)
    {
        return view('create.post')->with(['subject' => $subject, 'field' => $field, 'category' => $category]); 
    }
    
    public function store(Request $request) { // 👈 Ajaxデータ受信 ・・・ ②

        // バリデーション
        /*$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photos' => 'required',
            'photos.*' => 'image'
        ]);*/

        // 顧客データ保存
        $input=$request['post']; 
        $result=$post->fill($input)->save();

        // ファイル保存
        if($result && $request->hasFile('photos')) {

            foreach($request->photos as $photo) { // 👈 送信されたファイルをひとつずつ保存

                $path = $photo->store('files'); // 👈 「storage/app/attachments」フォルダに保存
                $file = new \App\file();
                $file->post_id = $post->id;
                $file->model = get_class($post);
                $file->path = $path;
                $file->key = 'photos';
                $file->save();

            }

        }

        return ['result' => true];

    }

    public function test() { // 👈 テスト用

        // 保存ファイルのデータと連結して取得
        $posts = \App\Post::with('files')->get();

        foreach($posts as $post) {

            $file = $post->files; // 👈 全ての関連ファイルを取得
            $photos = $files->filter(function($file){ // 👈 プロフィール写真のものだけ取得

                return ($file->key === 'photos');

            });

            foreach($photos as $photo) {

                $path = storage_path('app/'. $photo->path); // 保存したファイルのパス
                dump($path);

            }

        }

    }
}