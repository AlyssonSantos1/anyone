<!-- <?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;






class LoginController extends Controller
{

    public function loginform (Request $request)
    {
        return view('Login.Login');
    }

    public function loginok (Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $member = Member::where('email', $validated['email'])->first();
    
        if(!$member){
        
            return to_route('login')->with('message', 'The user not found');       
        }   

        session(['hierarchy' =>$member->hierarchy]);

        switch($member->role)
        {
        case 'Executive':
            return 'You are an Executive, Acess Authorized!';

        case 'InternalAdvisor':
            return 'You are an Internal Advisor, Acess Authorized';

        case 'Manager':
            return 'You are a Manager, Acess Authorized';

        case 'Associates':
            return 'You are an Associate, Acess Authorized';

        case 'User':
            return 'You are a User, Acess Authorized';

        }
    
    }

    public function showExecutive()
    {
        return view('Login.Login.blade.php');
    }

    public function showManager()
    {
        return view('Login.Manager.blade.php');
    }

    public function showAssociates()
    {
        return view('Login.Associates.blade.php');
    }

    public function showInternalAdvisors()
    {
        return view('Login.InternalAdvisors.blade.php');
    }

    public function showDefault()
    {
        return view('Login.Users.blade.php');
    }





}

 -->
