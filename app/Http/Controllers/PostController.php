<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slugblog;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    //
    public function displayslugpage()
    {
        return view('Frontend/tempslug');
    }
    public function addslug()
    {
      slugblog::create(['tittle'=>request('tittle')]);
      return redirect()->back();
    }


    public function getslug()
    {
      
      $slugs=SlugService::createSlug(Post::class, 'slugs' ,request('tittle'));
      return response()->json(['slugs'=>$slug]);
    }
}
