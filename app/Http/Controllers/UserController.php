<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function trash (Request $request){
        $member = $request->input('name');
        $member = $request->input('hierarchy');
        if($member == 'name' AND $hierarchy == 'users'){
            Member::delete([
                "review" =>$request->review_user,
                
            ]);

            return "The review was deleted";

        }else{

            return "The review cannot Deleted";
        }

            return view('users');


    }

    public function edit (Request $request){
        $member = $request->input('name');
        $member = $request->input('hierarchy');
        if($member == 'name' AND $hierarchy == 'users'){
            Member::edit([
                "review" =>$request->review_user,
                
            ]);

            return "The review was deleted";

        }else{

            return "The review cannot Deleted";
        }

            return view('editedusers');
            

    }
    

    
}
