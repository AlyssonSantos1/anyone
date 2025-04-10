<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Authenticatable
{
    use Notifiable;
    
    use HasFactory;

    protected $table = 'members';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 
        'email', 
        'role', 
        'hierarchy', 
        'insertedproject', 
        'personalreviews', 
        'ownerofreview',
        'password'
    ];

    protected $dates = ['created_at', 'updated_at'];

    
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

    public function member()
    {
        return $this->hasOne(Member::class);
    }
    
    
}
