<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\employDb;
use session;
use Hash;

class AuthController extends Controller
{
    //

    public function loadRegister()
    {
        if(Auth::user() && Auth::user()->is_admin==1)
         {
            return redirect('Admin/dashboarditem/dashboard');
         }
         else if(Auth::user() && Auth::user()->is_admin==0)
         {
            return view('Frontend/index');
         }
        return view('register');
    }

    public function userRegister(Request $request)
    {
        $request->validate(
            [
                'name' => 'string|required|min:2',
                'email' => 'string|required|max:100|unique:users',
                'password' => 'string|required|min:6'
            ]
            );


        $user= new User;

        $user->name= $request->name;
        $user->email= $request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return back()->with('success','Your Registation successfully');

    }



    public function loadlogin()
    {
         if(Auth::user() && Auth::user()->is_admin==1)
         {
            return view('Admin/dashboarditem/dashboard');
         }
         else if(Auth::user() && Auth::user()->is_admin==0)
         {
            return view('Frontend/index');
         }
        return view('Admin/login');
        
    }


    public function userlogin(Request $request)
    {
        $request->validate(
            [
               'email' => 'string|required|max:100',
               'password' => 'string|required'
            ]
            );
    
        $usercredetail=$request->only('email','password'); 
        if(Auth::attempt($usercredetail))
        {
            
            if(Auth::user()->is_admin==1)
            {
                return view('Admin/dashboarditem/dashboard');
            }
            else if(Auth::user()->is_admin==0)
            {
                return view('Frontend/index');
                
            }
          
        }
        else
        {
           
          return back()->with('error', 'User and password do not match from database');
        }
       
    }




    public function displaydashbord()
    {
        return view('Admin/dashboarditem/dashboard');
    }

    public function userdashbord()
    {
        return view('Frontend/index');
    }


    public function admindashboard()
    {
       // $userdb=employDb::all();
       // return view('Admin.dashboarditem.dashboard',compact('userdb'));
       return view('Admin/dashboarditem/dashboard');
    }

    public function logout(Request $request)
    {
        $request->Session()->flush();
        Auth::logout();
        return redirect('/');
    }



     public function forgetPasswordLoad()
     {
        return view('forgetpassword');
     }


     public function registeradmin(Request $req)
     {
         $insertdata=new employDb;
         $insertdata->name=$req->input('name');
         $insertdata->email=$req->input('email');
         $insertdata->phone=$req->input('phone');
         $insertdata->adhar=$req->input('adhar');

         $insertdata->save();
     

        return back()->with('message', 'data insert successfully in table');
     }



       public function destroyadmin(Request $req, $id)
      {
        $user = employDb::find($id);
        $user->delete();
          // print_r($id);
           //$id->delete();
           return back()->with('success','Company has been deleted successfully');
      }


      



        //profile function


        public function profileview()
        {
            $user =User::all();
            return view('admin.profile.profileview', compact('user'));
        }

        public function dashhome()
        {
            $adminuser=User::where('is_admin','1')->count();
            $normaluser=User::where('is_admin','0')->count();
            $useremp=employDb::count();        
            return view('admin.profile.homepage', compact('adminuser','normaluser','useremp'));
        }


        // temp



public function getData(Request $request)
{
    // Retrieve the data based on the provided $id
    $data =employDB::all();

    // Return the data as JSON
    return response()->json($data);
   // return redirect()->compact('data');
}



public function getDatathird(Request $request)
{
    // Retrieve the data based on the provided $id
    $data = User::all();
    dd($data);
    // Return the data as JSON
    return response()->json($data);
   // return redirect()->compact('data');
}
}