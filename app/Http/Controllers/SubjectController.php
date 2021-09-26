<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Subject $subject)
    {
        return view('manager.index')->with(['subjects' => $subject->get()]);
    }
    
    public function userindex(Subject $subject)
    {
        return view('user.index')->with(['subjects' => $subject->get()]);
    }
}
