<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Member;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {


            Gate::define('executive', function ($user){

                return $user->hierarchy === 'executive' && !is_null($user->hierarchy);
            });


    }
}
