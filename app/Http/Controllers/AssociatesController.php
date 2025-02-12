<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssociatesController extends Controller
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
            return view('edited');
        

    }

    public function greatest(request $request, int $id){
        $member = Member::findorFail($id);
        return view('associates');

    }

    public function visiondiamond (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if($name == 'name' && $hierarchy == 'manager'){
            Squad::read([
                "projectreviews" =>$request->projectreviews_project,
                "personalreviews" =>$request->personalreviews_personal
                
            ]);
            return 'The reviews now can be acess';

        }else{
            return 'Acess Denied, Only Associates Can see the Reviews';
        }

        return view('advisor');


    }

    public function swan(){
        return view('garden');
    }


}
