<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutpage;
use App\Models\service;
use App\Models\course;
use App\Models\pricing;
use App\Models\{blog,team,blogslug};

class FrontendController extends Controller
{
    //

    public function frontdisplay()
    {
        $courselist=course::get();
        $blogdata=blog::get();
        $teamdata=team::get();
        $dataclient=service::get();
        $userprice=pricing::get();
        $userdata=Aboutpage::get();
        return view('Frontend/index', compact('courselist','blogdata','teamdata','dataclient','userprice','userdata'));
    }

    public function aboutdisplay()
    {
        $userdata=Aboutpage::get();
        $teamdata=team::get();
        return view('Frontend/about/about', compact('userdata','teamdata'));
    }

    public function servicedisplay()
    {
        $servicedata=service::get();
        $courselist=course::get();
        return view('Frontend/services/servicespage',compact('servicedata','courselist'));
    }

    public function blogdisplay()
    {
        $userblog=blogslug::get();
        return view('Frontend/blog/blogpage', compact('userblog'));
    }


    public function blogdetailslug(Request $request, $slug)
    {
        if($slug)
        {
        $userdetail = blogslug::where('slug', $slug)->first(); 
        }
        
        return view('Frontend/blog/blogdetail', compact('userdetail'));
    }

    public function blogdetaildisplay()
    {
        
        return view('Frontend/blog/blogdetail');
    }


    public function contactdisplay()
    {
        return view('Frontend/contact/contactpage');
    }

    public function pricedisplay()
    {
        $userprice=pricing::get();
        return view('Frontend/page/pricing', compact('userprice'));
    }

    public function featuredisplay()
    {
        return view('Frontend/page/feature');
    }

    public function memberdisplay()
    {
        $teamdata=team::get();
        
        return view('Frontend/page/teammember', compact('teamdata'));
    }

    public function testmonialdisplay()
    {
        $dataclient=service::get();
        return view('Frontend/page/testimonial', compact('dataclient'));   
    }
    public function quotedisplay()
    {
        return view('Frontend/page/quote');
    }
}