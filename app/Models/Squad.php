<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;

    protected $fillable = [
        'teammanager', 
        'numberofmembers', 
        'reviewsofsquad', 
        'nameofwriterreview'
    ];


    public function members()    
    {
        return $this->belongsToMany(Squad::class, 'member_squad')
        ->withPivot('role') 
        ->withTimestamps(); 
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_squad')
            ->withTimestamps();
    }
}
