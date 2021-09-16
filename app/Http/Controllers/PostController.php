<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\FieldRequest;

class PostController extends Controller
{
    public function post(Subject $subject, Field $field, Category $category)
    {
        $posts=Post::where('category_id', $category->id)->simplepaginate(20);
        return view('manager.post')->with(['field' => $field, 'subject' => $subject, 'category' => $category, 'posts' => $posts]);  
    }
    
    public function create(Subject $subject, Field $field, Category $category)
    {
        return view('create.post')->with(['subject' => $subject, 'field' => $field, 'category' => $category]); 
    }
    
    public function store(PostRequest $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $input=$request['post'];
        $input['subject_id']=$subject->id;
        $input['field_id']=$field->id;
        $input['category_id']=$category->id;
        if($request->hasFile('file'))
        {
            $destination_path = 'public/files/posts';
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $request->file('file')->storeAs($destination_path,$file_name);
            $input['file'] = $file_name;
        }
        $post->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id.'/'.$field->id.'/'.$category->id);
    }
    
    public function destroy(Request $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $post_id=$request['post_id'];
        $post=Post::where('id', $post_id)->first();
        $post->delete();
        return redirect('/manager/subjects/'.$subject->id.'/'.$field->id.'/'.$category->id);
    }
    
    public function edit(Subject $subject, Field $field, Category $category, Post $post)
    {
        return view('manager.edit')->with(['subject' => $subject, 'field' => $field, 'category' => $category, 'post' => $post]); 
    }
    
    public function update(PostRequest $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $input=$request['post'];
        if($request->hasFile('file'))
        {
            $destination_path = 'public/files/posts';
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $request->file('file')->storeAs($destination_path,$file_name);
            $input['file'] = $file_name;
        }
        $post->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id.'/'.$field->id.'/'.$category->id.'/'.$post->id);
    }
    
    public function show(Subject $subject, Field $field, Category $category, Post $post)
    {
        return view('manager.show')->with(['field' => $field, 'subject' => $subject, 'category' => $category, 'post' => $post]);  
    }
}
