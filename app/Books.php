<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'user_id', 'title', 'genre', 'description', 'author',
        'publisher', 'pages', 'image_url', 'purchase_url'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
