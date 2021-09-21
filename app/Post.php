<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title','body','subject_id','field_id','category_id','files','paths'];
    
    protected $casts = ['files' => 'array', 'paths' => 'array'];
    
    public function getBodyWithLinkAttribute(): string
    {
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';
        return preg_replace($pattern, $replace, $this->body);
    }
}
