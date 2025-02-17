<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;



class UserController extends Controller
{
    public function turndown (Request $request){
        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;
            

            if ($hierarchy_user === 'Users'){
            Member::delete([
                "personalreviews" =>$request->personalreviews_user,
                
            ]);
            dd($hierarchy_user);
        }
            return "The review was deleted";

        } else {

            return "The review cannot Deleted";
        }

    }


    public function trash(Request $request){
        return view('Users.Exclusion.deleteusers');
    }


    public function change (Request $request, int $id){
        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;

            if ($hierarchy_user === 'Users'){
            Member::edit([
                "personalreviews" =>$request->personalreviews_user,
                
            ]);
        }
            return "The review was edited";

        } else {

            return "The review cannot Edit";
        }
    }

    public function edited (Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Users.EditUser.editeduser');            

    }
    

    
}
