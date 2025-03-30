<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'projectname', 
        'manager', 
        'numberofmembers', 
        'goals', 
        'description', 
        'projectreviews', 
        'authorreview'
    ];

    public function members()
    {
        return $this->belongsToMany(Member::class, 'member_project')
            ->withPivot('role') 
            ->withTimestamps(); 
    }

    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'project_squad');
    }
}
