<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'role', 
        'hierarchy', 
        'insertedproject', 
        'personalreviews', 
        'ownerofreview'
    ];

    
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'member_project')
            ->withPivot('role') 
            ->withTimestamps(); 
    }

    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'member_squad')
        ->withPivot('role') 
        ->withTimestamps(); 
    }
    
    
}
