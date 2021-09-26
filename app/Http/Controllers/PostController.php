<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Subject $subject, Field $field, Category $category)
    {
        $posts=Post::where('category_id', $category->id)->simplepaginate(20);
        return view('manager.post')->with(['field' => $field, 'subject' => $subject, 'category' => $category, 'posts' => $posts]);  
    }
    
    public function userpost(Subject $subject, Field $field, Category $category)
    {
        $posts=Post::where('category_id', $category->id)->simplepaginate(20);
        return view('user.post')->with(['field' => $field, 'subject' => $subject, 'category' => $category, 'posts' => $posts]);  
    }
    
    public function create(Subject $subject, Field $field, Category $category)
    {
        return view('create.post')->with(['subject' => $subject, 'field' => $field, 'category' => $category]); 
    }
    
    public function store(Request $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $input=$request['post'];
        
        $destination_path = 'public/files/posts';
        if($request->hasFile('files'))
        {
            $files = $request->file('files');
            foreach($files as $file){
                $file_name = $file->getClientOriginalName();
                $file->storeAS($destination_path,$file_name);
                $file_path[] = $file_name;
            }
            $input['files'] = $file_path;
        }
        if($request->hasFile('paths'))
        {
            $paths = $request->file('paths');
            foreach($paths as $path){
                $path_name = $path->getClientOriginalName();
                $path->storeAS($destination_path,$path_name);
                $path_path[] = $path_name;
            }
            $input['paths'] = $path_path;
        }
        
        $input['subject_id']=$subject->id;
        $input['field_id']=$field->id;
        $input['category_id']=$category->id;
        //dd($input);
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
    
    public function update(Request $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $input=$request['post'];
        $input['files'] = null;
        $input['paths'] = null;
        $destination_path = 'public/files/posts';
        if($request->hasFile('files'))
        {
            $files = $request->file('files');
            foreach($files as $file){
                $file_name = $file->getClientOriginalName();
                $file->storeAS($destination_path,$file_name);
                $file_path[] = $file_name;
            }
            $input['files'] = $file_path;
        }
        if($request->hasFile('paths'))
        {
            $paths = $request->file('paths');
            foreach($paths as $path){
                $path_name = $path->getClientOriginalName();
                $path->storeAS($destination_path,$path_name);
                $path_path[] = $path_name;
            }
            $input['paths'] = $path_path;
        }
        $post->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id.'/'.$field->id.'/'.$category->id.'/'.$post->id);
    }
}
