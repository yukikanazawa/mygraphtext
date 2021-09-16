<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\FieldRequest;

class SubjectController extends Controller
{
    public function index(Subject $subject)
    {
        return view('manager.index')->with(['subjects' => $subject->get()]);
    }
}
