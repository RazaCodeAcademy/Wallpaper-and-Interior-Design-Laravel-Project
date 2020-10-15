<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'paper_id', 'id');
    }
}
