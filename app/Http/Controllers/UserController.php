<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function trash (Request $request){
        $Squad = $request->squad;
        Squad::delete([
            // "review" =>$request->review_user,
            
        ]);
        // Funcao que todos os usuarios dos times podem deletar as reviews

        return view('Your review has been deleted');
    }

    public function edit (Request $request){
        $Squad = $request->squad;
        Squad::edit([
            // "review" =>$request->review_user,
            
        ]);

        return view('Your review has been edited');
    }
    
    public function avaliation (Request $request){
        $Squad = $request->squad;
        Squad::create([
            // "name" =>$request->name_user,
            // "email" =>$request->email_user,
            // "role" =>$request->role_user,
            // "hierarchy" =>$request->hierarchy_user,
            // "currentproject" =>$request->currentproject_user

        ]);

        return view('the reviews has been authorized');
    }
    
}
