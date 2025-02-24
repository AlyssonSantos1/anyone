<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Squad;





class UserController extends Controller
{
    public function turndown (Request $request, int $id){
        $member =  Member::findorFail($id);     

        $hierarchy = $request->input('hierarchy_user') ?: null;

            $member->update([
                "personalreviews" => null
    
            ]);        

        return 'The Personal Reviews Are deleted';

    }


    public function trash(Request $request, int $id){  
        $member = Member::findorFail($id);
        // return view('Associates.TradeMembers.swap', compact('member'));     
        return view('Users.Exclusion.deleteusers', compact('member'));
    }


    // public function change (Request $request, int $id){   
    //     $user = Member::findOrFail($id);
    //        $user->update([
    //             "personalreviews" =>$request->personalreviews_user,
                
    //         ]);
        
            
    // }

    // public function edited (Request $request, int $id){   
    //     $user = Member::all();
    //     return view('Users.EditUser.editeduser');            

    // }
    
    public function change (Request $request, int $id){
        $member = Member::findorFail($id);
        $member->update([
            
            "personalreviews" =>$request->personalreviews_user,
            "squad_id" =>$request->squad_id              

        ]);
    
        return 'The Member has been edited';

    }

    public function edited (Request $request, int $id){
        {
        $member = Member::findorFail($id);
        return view('Users.EditUser.editeduser', compact('member'));     
        } 
      
    }

    
}
