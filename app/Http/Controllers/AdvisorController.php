<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function newreview (Request $request){
        $name = $request->input('name');
        $hierarchy = $request->input('hierarchy');

        if ($name == 'name' &&  $hierarchy == 'InternalAdvisor'){

            Squad::create([
                
                "projectreviews" =>$request->projectreviews_project
    
            ]);

            return 'Write the Review of Project';
            
        }else{

            return 'No Permission You are not an Internal Advisor';

        } 
        return view('givereview');  
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



}
