<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function trash (Request $request, id $id){
        $Squad = $request->squad;
        Squad::delete([
            "review" =>$request->review_user,
            
        ]);
        // Funcao que todos os usuarios dos times podem deletar as reviews

        return view('Your review has been deleted');
    }

    public function edit (Request $request, id $id){
        $Squad = $request->squad;
        Squad::edit([
            "review" =>$request->review_user,
            
        ]);

        return view('Your review has been edited');
        //edit reviews deles mesmo
    }
    
    public function avaliation (Request $request, insertedproject $insertedproject){
        $Squad = $request->squad;
        Squad::read([
            "name" =>$request->name_user,
            "review" =>$request->review_user,
            "projectname" =>$request->projectname_user,
            "reviews" =>$request->reviews_team

        ]);

        return view('the reviews has been authorized');
        // A funcao em que podem ver as avaliacoes dos projetos do time e deles mesmos
        
    }


    
}
