<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    public function turndown (Request $request){        
        
        Member::delete([
                "personalreviews" => $request->personalreviews_user

            ]);

            return 'The personal review has been Deleted';
            
    
    }


    public function trash(Request $request){       
        return view('Users.Exclusion.deleteusers');
    }


    public function change (Request $request){       
            Member::edit([
                "personalreviews" =>$request->personalreviews_user,
                
            ]);
        
            
    }

    public function edited (Request $request){        
        return view('Users.EditUser.editeduser');            

    }
    

    
}
