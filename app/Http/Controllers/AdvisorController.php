<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function newreview (Request $request)
    {
        return view('InternalAdvisors.WriteReview.givereviews');
    }

    public function newest (){  

        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;
            
            if ($hierarchy_user === 'InternalAdvisor'){

            Squad::create([
                
                "projectreviews" =>$request->projectreviews_project
    
            ]);
        }
            return 'Write the Review of Project';
            
        }else{

            return 'No Permission You are not an Internal Advisor';

        }
    }


    public function pyramids (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($name == 'name' &&  $hierarchy == 'InternalAdvisor'){

            Squad::read([
                
                "projectreviews" =>$request->projectreviews_project
    
            ]);

            return 'See the Review of Project';
            
        }else{

            return 'No Permission, You are not an Internal Advisor';

        } 
        return view('projectreviews');  
    }

    public function bird(){
        return view('acomplished');
    }



}
