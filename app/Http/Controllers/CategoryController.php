<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Subject $subject, Field $field)
    {
        return view('create.category')->with(['subject' => $subject, 'field' => $field]); 
    }
    
    public function store(Request $request, Subject $subject, Field $field, Category $category)
    {
        $input=$request['category']; 
        $input['subject_id']=$subject->id;
        $input['field_id']=$field->id;
        $category->fill($input)->save();
        return redirect('/manager/subjects/'.$subject->id);
    }
    
    public function destroy(Request $request, Subject $subject, Field $field, Category $category, Post $post)
    {
        $category_id=$request['category_id'];
        $category=Category::where('id', $category_id)->first();
        $category->delete();
        return redirect('/manager/subjects/'.$subject->id);
    }
}
