<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class, 'paper_id', 'id');
    }
}
