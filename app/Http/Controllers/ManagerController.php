<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class ManagerController extends Controller
{
    public function index(subject $subject)
    {
        return view('manager.index')->with(['subjects' => $subject->get()]);
    }
    public function subject(subject $subject)
    {
        $fields=Field::where('subject_id', $subject->id)->simplepaginate(10);
        return view('manager.subject')->with(['fields' => $fields, 'subject' => $subject]);  
    }
    public function field(subject $subject, field $field)
    {
        $categories=Category::where('field_id', $field->id)->simplepaginate(10);
        return view('manager.field')->with(['field' => $field, 'subject' => $subject, 'categories' => $categories]);  
    }
}
