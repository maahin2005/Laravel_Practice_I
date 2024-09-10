<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Position extends Model
{
    use HasFactory;

    // Set the primary key to be non-incrementing and a string
    public $incrementing = false;
    protected $keyType = 'string';

    // Ensure ULID is automatically generated for the primary key
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Assign ULID only if the primary key is not already set
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::ulid();
            }
        });
    }
    protected $fillable = ['title'];
}
