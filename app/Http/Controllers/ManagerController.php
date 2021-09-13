<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class ManagerController extends Controller
{
    public function index(subject $subject)
    {
        return view('manager.index')->with(['subjects' => $subject->get()]);
    }
    
    public function subject(subject $subject, category $category)
    {
        $fields=Field::where('subject_id', $subject->id)->simplepaginate(10);
        return view('manager.subject')->with(['fields' => $fields, 'subject' => $subject, 'categories' => $category->get()]);  
    }
    
    public function category(subject $subject, field $field, category $category)
    {
        $posts=Post::where('category_id', $category->id)->simplepaginate(20);
        return view('manager.category')->with(['field' => $field, 'subject' => $subject, 'category' => $category, 'posts' => $posts]);  
    }
    
    public function show(subject $subject, field $field, category $category, post $post)
    {
        return view('manager.show')->with(['field' => $field, 'subject' => $subject, 'category' => $category, 'post' => $post]);  
    }
    
    public function fieldcreate(subject $subject)
    {
        return view('create.field')->with(['subject' => $subject]); 
    }
    
    public function fieldstore(Request $request, subject $subject, Field $field)
    {
        $input=$request['field']; 
        $input['subject_id']=$subject->id;
        $field->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id);
    }
    
    public function categorycreate(subject $subject, Field $field)
    {
        return view('create.category')->with(['subject' => $subject, 'field' => $field]); 
    }
    
    public function categorystore(Request $request, subject $subject, Field $field, category $category)
    {
        $input=$request['category']; 
        $input['subject_id']=$subject->id;
        $input['field_id']=$field->id;
        $category->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id);
    }
    
    public function postcreate(subject $subject, Field $field, category $category)
    {
        return view('create.post')->with(['subject' => $subject, 'field' => $field, 'category' => $category]); 
    }
    
    public function poststore(Request $request, subject $subject, Field $field, category $category, post $post)
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
            $path = $request->file('file')->storeAs($destination_path,$file_name);
            
            $input['file'] = $file_name;
        }
        $post->fill($input)->save();
        return back();
        //return redirect('/manager/subjects/'.$subject->id&$field->id&$category->id);
    }
}
