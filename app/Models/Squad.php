<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;

    protected $fillable = ["teammanager", "numberofmembers", "projectfocus", "reviewsofsquad", "nameofwriterreview"];
   

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_member_squad');
    }
    
    public function members()
    {
        return $this->hasMany(Member::class);  // Relaciona os membros com a squad
    }
    
    
}
