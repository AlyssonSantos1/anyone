<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ["squad_id", "name", "email", "role", "hierarchy", "insertedproject", "personalreviews", "ownerofreview"];
}
