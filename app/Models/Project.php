<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = ["projectname", "managername", "numberofmembers", "goals", "description", "projectreviews", "authorreview", ];


    public function reviews(): BelongsTo
    {
        return $this->hasMany(Review::class);
        
    }

    public function squads(): Hasmany
    {
        return $this->belongsToMany(Squad::class, 'projectsquad');
    }
    
}
