<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function turn (Request $request){
        $Squad = $request->squad;
        Squad::turn([
            // "name" =>$request->name_user,
            // "email" =>$request->email_user,
            // "role" =>$request->role_user,
            // "hierarchy" =>$request->hierarchy_user,
            // "currentproject" =>$request->currentproject_user

        ]);
        //Funcao para tornar consultor temporario em outro projeto

        return view('turn to temporary internal advisory role');
    }

    public function analisys (Request $request){
        $Squad = $request->squad;
        Squad::see([
            // "name" =>$request->name_user,
            // "email" =>$request->email_user,
            // "role" =>$request->role_user,
            // "hierarchy" =>$request->hierarchy_user,
            // "currentproject" =>$request->currentproject_user

        ]);

        //Funcao que os gerentes podem ver os comentarios de si mesmo, do seu time e dos seus projetos

        return view('Now you can see reviews of themselves,at the own team or their projects');
    }
}
