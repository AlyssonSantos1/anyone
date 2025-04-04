<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Squad;





class UserController extends Controller
{
    public function index()
    {
        return view('Users.index');
    }


    public function turndown (Request $request){
        $member = auth()->user();   

            $member->update([
                "personalreviews" => null
    
            ]);          

        return 'The Personal Reviews Are deleted';

    }


    public function trash(Request $request){  
        $member = auth()->user();  
        return view('Users.Exclusion.deleteusers', compact('member'));
    }


    public function change (Request $request){
        $request->validate([
            'personalreviews' => 'required|string|max:255',
        ]);

        $member = auth()->user();     

        $personalReviews = $request->input('personalreviews');


        if ($personalReviews !== null) {
            $member->update([
                'personalreviews' => $personalReviews,
            ]);
        }
        return 'The Personal Review Edited!';
    }

    public function edited (Request $request){
        {
        $member = auth()->user();
        return view('Users.EditUser.editeduser', compact('member'));     
        } 
      
    }

    
}
