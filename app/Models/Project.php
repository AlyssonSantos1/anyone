<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = ["projectname", "manager", "numberofmembers", "goals", "description", "projectreviews", "authorreview" ];

    public function members()
    {
        return $this->belongsToMany(Member::class, 'project_member_squad', 'project_id', 'member_id');
    }
    
    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'project_member_squad');
    }
    
    
}
