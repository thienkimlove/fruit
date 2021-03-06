<?php

namespace App;

class Post extends BaseModel
{
    protected $fillable = ['title', 'desc', 'image', 'content', 'category_id', 'price', 'home_slide'];

    /**
     * Relationship between posts and categories.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
