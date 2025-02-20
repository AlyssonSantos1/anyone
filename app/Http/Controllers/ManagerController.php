<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Squad;
use App\Http\Project;



class ManagerController extends Controller

{
    public function swapuser (Request $request, int $id){
        $member = Member::findorFail($id);
            $member->update([
                "hierarchy" =>$request->hierarchy_user,
                "role" =>$request->role_user,
                "insertedproject" =>$request->insertedproject_user,
    
            ]);

        
        return 'The Manager or Associate turn to temporary internal advisor in the project';

    }

    

    public function traded(Request $request, int $id){
        $member = Member::findorFail($id);
        return view('Managers.Traded.swapadvisors', compact('member'));
    }


    public function catch (Request $request){
       
        Member::find([
            "reviews" =>$request->reviews_project,
            "personalreviews" =>$request->personalreviews_personal
            
        ]);

    }

    public function found (Request $request){
        return view('Managers.Vision.allreviews');
    }

    

}
