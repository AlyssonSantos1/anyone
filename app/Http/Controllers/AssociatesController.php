<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;



class AssociatesController extends Controller
{
    public function swapuser (Request $request, int $id){
        
       
            Member::edit([
                "name" =>$request->name_user,
                "currentproject" =>$request->currentproject_user,
                "role" =>$request->role_user
    
            ]);
        
        return 'The member are swap of the hierarchy to temporary internal advisor in the project';
        
    }

    public function map (Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Associates.TradeMembers.swap', compact('member'));
    }

    public function glasses (Request $request){
       
            Member::find([
                "reviews" =>$request->reviews_project,
                "personalreviews" =>$request->personalreviews_personal
                
            ]);
        }

    public function swan(Request $request){
        return view('Associates.ProjectThemselves.associates');
    }


}
