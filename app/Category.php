<?php

namespace App;

class Category extends BaseModel
{
    protected $fillable = ['title', 'desc', 'image'];
    
    /**
     * Relationships between categories and posts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post')->latest()->take(8)->get();
    }
}
