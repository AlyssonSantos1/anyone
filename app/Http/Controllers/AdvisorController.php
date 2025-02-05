<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function turn (Request $request){
        $Squad = $request->squad;
        Squad::swap([
            
            "role" =>$request->role_user,
            "hierarchy" =>$request->hierarchy_user,
            "currentproject" =>$request->currentproject_user

        ]);
    }

    public function inside (Request $request){
        $Squad = $request->squad;
        Squad::internvision([
            
            // "role" =>$request->role_user,
            // "hierarchy" =>$request->hierarchy_user,
            // "currentproject" =>$request->currentproject_user

        ]);
    }
    // Funcao que os consultores podem ver os comentarios do projeto

}
