<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','subject_id','field_id','category_id','file'];
    
    public function attachments() {

        return $this->hasMany('App\File', 'post_id', 'id')
            ->where('model', self::class);  // 「App\Customer」のものだけ取得

    }
}
