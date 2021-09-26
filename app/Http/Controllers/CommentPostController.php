<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Field;
use App\Category;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentPostController extends Controller
{
    public function show(Subject $subject, Field $field, Category $category, $post_id)
    {
        $post=Post::where('id', $post_id)->first();
        $comments=Post::find($post->id)->comments;
        return view('manager.show')->with(['field' => $field, 'subject' => $subject, 
        'category' => $category, 'post' => $post, 'comments' => $comments]);  
    }
    
    public function usershow(Subject $subject, Field $field, Category $category, $post_id)
    {
        $post=Post::where('id', $post_id)->first();
        $comments=Post::find($post->id)->comments;
        return view('user.show')->with(['field' => $field, 'subject' => $subject, 
        'category' => $category, 'post' => $post, 'comments' => $comments]);  
    }
    
    public function store(Request $request, Comment $comment, Subject $subject, $post_id)
    {
        $input=$request['comment']; 
        $input['post_id'] = $post_id;
        $comment->fill($input)->save();
        return back();
    }
    
    public function destroy(Request $request, Comment $comment)
    {
        $comment_id=$request['comment_id'];
        $comment=Comment::where('id', $comment_id)->first();
        $comment->delete();
        return back();
    }
}
