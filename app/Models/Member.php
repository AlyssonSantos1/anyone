<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ["squad_id", "name", "email", "role", "hierarchy", "insertedproject", "personalreviews", "ownerofreview"];

    public function squad()
    {
        return $this->belongsTo(Squad::class); 
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_member_squad', 'member_id', 'project_id');
    }

}   


