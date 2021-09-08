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
        return view('manager.fieldcreate')->with(['subject' => $subject]); 
    }
    
    public function fieldstore(Request $request, subject $subject, Field $field)
    {
        $input=$request['field']; 
        $input['subject_id']=$subject->id;
        $field->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id);
    }
    
    public function categorycreate(subject $subject)
    {
        return view('manager.categorycreate')->with(['subject' => $subject]); 
    }
    
    public function categorystore(Request $request, subject $subject, Field $field)
    {
        $input=$request['field']; 
        $input['subject_id']=$subject->id;
        $field->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id);
    }
}
