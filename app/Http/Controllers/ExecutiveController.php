<?php


namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Project;
use App\Models\Squad;
use Illuminate\Http\Request;



class ExecutiveController extends Controller
{
    public function create (Request $request)      
    {
        return view('Executive.Newusercompany.newuser');
    }
    
    public function store (Request $request){

        if (!session()->has('hierarchy')|| strtolower(session('hierarchy')) !== 'Executive'){

            abort(403, 'Acess Denied');
        }

        // $user = Member::where('email', $request->email_user)->first();

        // if (Gate::denies('executive',auth()->user())){

        //     abort(403, 'Dont Have Any permission to make this action');
        // }

            Member::create([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user, 
                "squad_id" =>$request->squad_id          
                
    
            ]);
           
    
            return 'The User Has been created';
     
    }

    public function edition (Request $request, int $id){
        {
        $member = Member::findorFail($id);
        return view('Executive.EditMembers.changeduser', compact('member'));     
        } 
      
    }
        
    

    public function changed(Request $request, int $id){
            $member = Member::findorFail($id);

            // if (!session()->has('hierarchy')|| strcasecmp(session('hierarchy')) !== '0'){

            //     abort(403, 'Acess Denied');
            // }
    

            $member->update([
                "name" =>$request->name_user,
                "email" =>$request->email_user,
                "role" =>$request->role_user,
                "hierarchy" =>$request->hierarchy_user,
                "insertedproject" =>$request->insertedproject_user,
                "personalreviews" =>$request->personalreviews_user,
                "ownerofreview" =>$request->ownerofreview_user,
                "squad_id" =>$request->squad_id              
    
            ]);
        
            return 'The Member has been edited';

        
        
           
    }

    public function newproject (Request $request){
       {
        $project = Project::all();
        return view('Executive.BuildNewProjects.newproject', compact('project'));
       }
    }

    public function congrats (Request $request){


            Project::create([
                "projectname" =>$request->projectname_project,
                "manager" =>$request->manager_project,
                "numberofmembers" =>$request->numberofmembers_project,
                "goals" =>$request->goals_project,
                "description" =>$request->description_project,
                "reviews" =>$request->reviews_project,
                "authorreview" =>$request->auhtorreview_project
    
            ]);         
            
            return 'The Project has been created';
            
    }
        
       

        
    



    public function vision (Request $request){

        if ($request->has('name_user') && $request->has('hierarchy_user') && $request->filled('name_user') && $request->filled('hierarchy_user')){
            $name_user = $request->name_user;
            $hierarchy_user = $request->hierarchy_user;
            

            
            if ($hierarchy_user === 'executive'){
            
            Squad::read([
                
                "nameofwriterreview" =>$request->nameofwriterreview_project,
                "ownerofreview" =>$request->ownerofreview_project,
                "authorreview" =>$request->authorreview_project
                
    
            ]);

            return "The views now can be viewed";

        }else{
            return 'Acess Denied, Executive Only';
        }
            return view('allreviews');   
        }

    }

    
        

        

}