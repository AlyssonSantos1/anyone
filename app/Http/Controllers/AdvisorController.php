<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Member;
use App\Models\Squad;





class AdvisorController extends Controller
{

    public function newreview (Request $request)
    {
        return view('InternalAdvisors.WriteReview.givereviews');
    }


    public function newest (Request $request){  
        $request->validate([

            'projectreviews' => 'nullable|string',

        ]);

            Project::create([                
                "reviews" =>$request->reviews_project,
    
            ]);
        
            return 'The Review is Writed';

    }


    


    public function pyramids (Request $request){

            Squad::read([
                
                "projectreviews" =>$request->projectreviews_project
    
            ]);
        
            return 'See the Review of Project';
            
        
        }
        

        public function target(Request $request)
        {
            return view('InternalAdvisors.seereviews.projectreview');
        }
        
}


    


