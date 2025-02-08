<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller

{
    public function swapuser (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager' OR $hierarchy == 'associates'){
            Squad::edit([
                "name" =>$request->name_user,
                "currentproject" =>$request->currentproject_user,
                "role" =>$request->role_user
    
            ]);

        return 'The $name are swap of the $hierarchy to temporary internal advisor in the $project';
        
        }else{
            return 'Acess Denied, Executive Only';
        }
            return view('swap');
        

    }

    public function avaliation (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager'){
            Squad::read([
                "name" =>$request->name_user,
                "review" =>$request->review_user,
                "projectname" =>$request->projectname_user,
                "reviews" =>$request->reviews_team
                
            ]);
        }
        

        return view('the reviews has been authorized');
        // mesma logica aqui if/else pra saber se é manager ou nao pra autorizar a operacao 
        // A funcao em que podem ver as avaliacoes dos projetos do time e deles mesmos
        // essa mesma funcao ta em usercontroller mas eles podem ver dos seus projetos se estiver em mamis de um
    }


}
