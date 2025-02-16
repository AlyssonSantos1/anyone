<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Member;
use App\Http\Project;


class AssociatesController extends Controller
{
    public function swapuser (Request $request, int $id){
        
        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;

            if ($hierarchy_user === 'associates'){
            Member::edit([
                "name" =>$request->name_user,
                "currentproject" =>$request->currentproject_user,
                "role" =>$request->role_user
    
            ]);
        
        return 'The member are swap of the hierarchy to temporary internal advisor in the project';
        
        } else {

            return 'Acess Denied, Executive Only';

        }
        
    }
        

    }

    public function map (Request $request){
        $member = Member::findorFail($id);
        return view('swapmembers', compact('member'));
    }

    public function glasses (Request $request){
        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;

            if ($hierarchy_user === 'Associates'){
            Member::read([
                "projectreviews" =>$request->projectreviews_project,
                "personalreviews" =>$request->personalreviews_personal
                
            ]);
        }
            return 'The reviews now can be acess';

        }else{

            return 'Acess Denied, Only Associates Can see the Reviews';
            
        }
    

    }

    public function swan(Request $request){
        return view('Associates.ProjectThemselves.advisors2');
    }


}
