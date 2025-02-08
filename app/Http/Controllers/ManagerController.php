<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller

{
    public function turn (Request $request, id $id){
        $Squad = $request->squad;
        Squad::edit([
            "name" =>$request->name_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);
        //Funcao para tornar consultor temporario em outro projeto
        // mesma logica aqui if/else pra saber se é manager ou nao pra autorizar a operacao

        return view('turn to temporary internal advisory role');
    }

    public function avaliation (Request $request){
        $Squad = $request->squad;
        Squad::read([
            "name" =>$request->name_user,
            "review" =>$request->review_user,
            "projectname" =>$request->projectname_user,
            "reviews" =>$request->reviews_team
            
        ]);

        return view('the reviews has been authorized');
        // mesma logica aqui if/else pra saber se é manager ou nao pra autorizar a operacao 
        // A funcao em que podem ver as avaliacoes dos projetos do time e deles mesmos
        // essa mesma funcao ta em usercontroller mas eles podem ver dos seus projetos se estiver em mamis de um
    }


}
