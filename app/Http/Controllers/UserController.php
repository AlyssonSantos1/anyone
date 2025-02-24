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
        return view('Users.Exclusion.deleteusers', compact('member'));
    }


    public function change (Request $request, int $id){

        $request->validate([
            'personalreviews' => 'required|string|max:255',
        ]);

        $member =  Member::findorFail($id);     

        $personalReviews = $request->input('personalreviews');


        if ($personalReviews !== null) {
            $member->update([
                'personalreviews' => $personalReviews,
            ]);
        }
        return 'The Personal Review Edited!';
    }

    public function edited (Request $request, int $id){
        {
        $member = Member::findorFail($id);
        return view('Users.EditUser.editeduser', compact('member'));     
        } 
      
    }

    
}
