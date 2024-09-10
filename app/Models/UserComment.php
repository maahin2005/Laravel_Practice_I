<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_post_id'];

    public function post()
    {
        return $this->belongsTo(UserPost::class, 'user_post_id');
    }
}
