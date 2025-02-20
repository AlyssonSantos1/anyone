<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    public function turndown (Request $request){
        $user = auth()->user();
        $reviewToDelete = Member::where('id', $user->id)->first(); 
        if ($reviewToDelete && $reviewToDelete->personalreviews === $request->personalreviews_user && $reviewToDelete->ownerofreview === $user->id) {
            $reviewToDelete->delete([
                "personalreviews" => $request->personalreviews_user

            ]);
            return 'The personal review has been Deleted';
            
        }else{
            return 'You have not authorized to make this action';
        }

    }


    public function trash(Request $request){
        if (Auth::check()){
            return view('Users.Exclusion.deleteusers');

        } else {
            return 'You are not user authenticated';
        }
        
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
