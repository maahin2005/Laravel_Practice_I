<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

    // Set the primary key to be non-incrementing and a string
    public $incrementing = false;
    protected $keyType = 'string';

    // Ensure UUID is automatically generated for the primary key
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Assign UUID only if the primary key is not already set
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    protected $fillable = ['name'];
}
