<?php

namespace App;

class Category extends BaseModel
{
    protected $fillable = ['title', 'desc'];
    
    /**
     * Relationships between categories and posts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
