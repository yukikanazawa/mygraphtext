<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function field(Subject $subject, category $category)
    {
        $fields=Field::where('subject_id', $subject->id)->simplepaginate(10);
        return view('manager.field')->with(['fields' => $fields, 'subject' => $subject, 'categories' => $category->get()]);  
    }
    
    public function userfield(Subject $subject, category $category)
    {
        $fields=Field::where('subject_id', $subject->id)->simplepaginate(10);
        return view('user.field')->with(['fields' => $fields, 'subject' => $subject, 'categories' => $category->get()]);  
    }
    
    public function create(Subject $subject)
    {
        return view('create.field')->with(['subject' => $subject]); 
    }
    
    public function store(Subject $subject, Field $field, Request $request)
    {
        $input=$request['field'];
        $input['subject_id']=$subject->id;
        $field->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id);
    }
    
    public function destroy(Request $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $field_id=$request['field_id'];
        $field=Field::where('id', $field_id)->first();
        $field->delete();
        return redirect('/manager/subjects/'.$subject->id);
    }
}
