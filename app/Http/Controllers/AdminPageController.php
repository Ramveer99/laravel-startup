<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutpage;
use App\Models\{blog,team,pricing,service,course,blogslug};
use Cviebrock\EloquentSluggable\Services\SlugService;
use Excel;
use App\Exports\Userexport;
use App\Imports\Userimport;
use App\Exports\UserexportSingle;

class AdminPageController extends Controller
{
    //
    public function dispalyMainpage()
    {
        $userdata=course::count();
        $clientdata=service::count();
        $usercourse=blog::count();
        $userprice=pricing::count();
        return view('Admin/home/homedashboard', compact('userdata','clientdata', 'usercourse','userprice'));
    }

    public function displayAbout()
    {
        $userdata=Aboutpage::get();
        return view('Admin/aboutpage/aboutupdate' ,compact('userdata'));
    }
    public function displayService()
    {
        $courselist=course::get();
        return view('Admin/service/serviceupdate',compact('courselist'));
    }
    // blog function for controlle blog activity
    public function displayBloggrid()
    {
        $userblog=blogslug::get();
        return view('Admin/Blogpage/bloggride', compact('userblog'));
    }
    public function displayBlogdetail()
    {
        return view('Admin/Blogpage/blogdetail');
    }


    

    public function displayteampage(Request $req)
    {
      // $search= $req['search'] ?? '';
      // if($search != '')
      // {
      //  $teamdata=team::where('name','LIKE',"%$search%")->get();
      // }else{
      //   $teamdata=team::paginate(3);
      // }
      $teamdata=team::all();
      $data=compact('teamdata');
       return view('Admin/page/team')->with($data);
       // return response()->json(['data' => $data]);
    }

    public function displayprice()
    {
      $userprice=pricing::get();
      return view('Admin/page/price',compact('userprice') );
    }

    public function displaytestimonial()
    {
      $clientdata=service::get();
      return view('Admin/page/testimonial', compact('clientdata'));
    }

    public function aboutupdate(Request $request, $id)
      {
        
         $request->validate([   
           'number' => 'required|numeric|digits_between:9,10',    
         ]);  
  
         $user = Aboutpage::find($id);  
        // dd($user);
          $user->tittle =  $request->get('tittle');  
          $user->heading = $request->get('heading');  
          $user->paragraph= $request->get('paragraph');  
          $user->number = $request->get('number');  

          $file=$request->image;
          $name=$file->getClientOriginalName();
          $file->storeAs('public/image',$name);
          $user->image=$name;  
          //$user->image= $request->get('image')  
          $user->save();  
        return back()->with('success','about page has been update successfully');
      }


      public function courseupdate(Request $request , $id)
      {
        $request->validate([  
                 'coursename'=>'required',  
                'describe'=>'required',
        ]);
        $userdata=course::find($id);
        $userdata->coursename =  $request->get('coursename');  
        $userdata->describe = $request->get('describe');  
        $userdata->save();  
        return back()->with('success','Course has been update successfully');
      }


      public function bloggridupdate(Request $request , $id)
      { 
         




        $user=blogslug::find($id);
        $user->subject=$request->get('subject');
        $user->author=$request->get('authors');
        $user->current=$request->get('current');
        $user->tittle=$request->get('tittle');
       
        $user->about=$request->get('about');
        
        $file=$request->image;
        if($request->hasfile('image') && $request->file('image')->isValid())
        {
        $name=$file->getClientOriginalName();
        $file->storeAs('public/image',$name);
        $user->photo=$name;
        }
        $user->save();
        
        return back()->with('success','bloggrid page has been update successfully');

      }



      public function teamupdate(Request $request, $id)
      {
       
        $teamdata=team::find($id);
        $teamdata->name=$request->get('name');
        $teamdata->department=$request->get('department');

        $file=$request->image;
        if($request->hasfile('image') && $request->file('image')->isValid())
        {
          $name=$file->getClientOriginalName();
          $file->storeAs('public/image', $name);
          $teamdata->photo=$name;
       
        }    
        $teamdata->save();
        return back()->with('success','team member page has been update successfully');        
      }

    public function testimonialupdate(Request $request, $id)
    {
      
        $clientdata=service::find($id);
     
        $clientdata->ClientName=$request->get('name');
        $clientdata->department=$request->get('department');
        $clientdata->description=$request->get('description');

        $file=$request->image;
        if($request->hasfile('image') && $request->file('image')->isValid())
        {
          $name=$file->getClientOriginalName();
          $file->storeAs('public/image', $name);
          $clientdata->image=$name;
       
        }    
        $clientdata->save();
        return back()->with('success','team member page has been update successfully');     
    }


    Public function priceupdate(Request $request, $id)
    {
      $userprice=pricing::find($id);
      $userprice->plan=$request->get('plan');
      $userprice->planheading=$request->get('planheading');
      $userprice->price=$request->get('price');
      $userprice->save();
      return back()->with('success','price page has been update successfully'); 

    }


    public function addteammember(Request $req)
    {
      $teamdata= new team;
      $teamdata->name=$req->name;
      $teamdata->department=$req->department;

      $file=$req->image;
      $name=$file->getClientOriginalName();
      $file->storeAs('public/image', $name);
      $teamdata->photo=$name;
      
      $teamdata->save();

      return back()->with('success','team member  has been Add successfully');  

    }

    public function destoryteammember(Request $req, $id)
    {
      $teamdata=team::find($id);
      $teamdata->delete();
      return back()->with('success','team member  has been Delete successfully');  

    }



    public function userExport()
    {
      return Excel::download(new Userexport, 'userdata.xlsx');
    }

    public function userImport(Request $req)
    {
      Excel::import(new Userimport, $req->file('file'));
      return back()->with('success','file  has been import successfully');  
      
    }

    public function userExportSingle(Request $req, $id)
    {
      try
      {
        $user = team::find($id);
        return Excel::download(new UserexportSingle($user->id), 'userdatasingle.xlsx');
      }
      catch(\Exception $e)
      {
        return redirect()->back()->with('error', 'Team not found.');
      }
    }


}
