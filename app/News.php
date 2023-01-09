<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'anons', 'text', 'tags'
    ];

    protected $dates = [
        'publish_date'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'news_to_tags');
    }

    public function getTagsAsString()
    {
        $tags = [];
        foreach ($this->tags as $tag) {
            $tags[] = $tag->name;
        }
        return implode(', ', $tags);
    }
}
