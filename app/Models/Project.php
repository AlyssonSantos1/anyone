<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = ["projectname", "managername", "projectfocus", "reviews"];

    public function user(): BelongsTo
    {
        return $this->hasMany(Comment::class);
    }

    public function comments(): Hasmany
    {
        return $this->hasMany(Comment::class);
    }
    
}
