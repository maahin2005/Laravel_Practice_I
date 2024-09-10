<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    public function comments()
    {
        return $this->hasMany(UserComment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
