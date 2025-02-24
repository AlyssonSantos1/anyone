<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;

    protected $fillable = ["teammanager", "numberofmembers", "role", "hierarchy", "currentproject", "reviewsofsquad"];

    public function user(): BelongsTo
    {
        return $this->hasMany(Comment::class);
    }

    public function comments(): Hasmany
    {
        return $this->hasMany(Comment::class);
    }

    public function projects(): BelongstoMany
    {
        return $this->belongsToMany(Squad::class, 'project_squad');
    }
    
}
