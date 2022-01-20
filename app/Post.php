<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'text', 'coverImg'
    ];

    public function user()
    {
        return $this->belongsTo("App\User",  "author_id");
    }
}
