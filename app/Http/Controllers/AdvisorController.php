<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function turn (Request $request, id $id, hierarchy $hierarchy){
        $Squad = $request->squad;
        Squad::edit([
            "name" =>$request->name_user,
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);
        //Funcao para tornar consultor temporario em outro projeto ta o mesmo nome da funcao que no metodo manager
        //- apenas para referencia a variavel $squad ta errada mas é so o esboco do codigo
        // logica if/else pra saber se é um consultor ou nao e autorizar a operacao

        return view('turn to temporary internal advisory role');
    }

    public function inside (Request $request){
        $Squad = $request->squad;
        Squad::read([         
           
            "projectreviews" =>$request->projectreviews_project,
            "projectname" =>$request->projectname_project

        ]);
    }
    // Funcao que os consultores podem ver os comentarios do projeto
    // logica if/else pra saber se é um consultor ou nao e autorizar a operacao

}
