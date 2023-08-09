<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminPageController;
use App\Models\Aboutpage;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//display home page

//route::get('/user/home',[FrontendController::class,'frontdisplay'])->name('homepage');



  // Route::get('/user/dashbord',[AuthController::class,'userdashbord'])->name('userhomepage');
  route::get('/',[FrontendController::class,'frontdisplay'])->name('userhomepage');
//display about page

     Route::get('/about',[FrontendController::class,'aboutdisplay'])->name('aboutpage');
     
     //display service page
     
     Route::get('/service',[FrontendController::class,'servicedisplay'])->name('servicepage');
     
     //display blog page
     
     Route::get('/blog',[FrontendController::class,'blogdisplay'])->name('blogpage');
     //Route::get('/createslug', [FrontendController::class, 'slugindex']);
     
     //display blog detail page
     
     Route::get('/blogdetail/{slug?}',[FrontendController::class,'blogdetailslug'])->name('blogdetailslug');
     Route::get('/blog/blogdetail',[FrontendController::class,'blogdetaildisplay'])->name('blogdetailpage');
     
     
     
     
     //display price page
     
     Route::get('/price',[FrontendController::class,'pricedisplay'])->name('pricedetailpage');
     //diplay our feature page
     Route::get('/feature',[FrontendController::class,'featuredisplay'])->name('featurepage');
     //diplay team member page
     Route::get('/team-memeber',[FrontendController::class,'memberdisplay'])->name('team-memberpage');
     //diplay testmonial page
     Route::get('/testmonial',[FrontendController::class,'testmonialdisplay'])->name('testmonialpage');
     //display Quote page
     Route::get('/quote',[FrontendController::class,'quotedisplay'])->name('quotepage');
     
     
     
     //display contact page
     
     
     Route::get('/contact',[FrontendController::class,'contactdisplay'])->name('contactpage');
     


Route::get('/register',[AuthController::class, 'loadRegister']);
Route::post('/register',[AuthController::class,'userRegister'])->name('StudentRegister');


//login page

Route::get('/login', function()
{
   return redirect('/admin');
});


Route::get('/admin',[AuthController::class,'loadlogin']);
Route::post('/admin/login',[AuthController::class,'userlogin'])->name('userlogin');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


// Route::get('/admin', function()
// {
//     return view('Frontend.index');
// });

//all admin operation 


Route::group(['middleware' => ['web' ,'checkadmin' ]], function()
{
    Route::get('/admin/dashboard',[AuthController::class,'displaydashbord'])->name('dashboarpage');

    //page of about modification
    Route::get('/admin/dashboard/home',[AdminPageController::class,'dispalyMainpage'])->name('mainpage');
    Route::get('/admin/dashboard/about',[AdminPageController::class, 'displayAbout'])->name('adminaboutpage');
    Route::get('/admin/dashboard/service',[AdminPageController::class, 'displayService'])->name('adminServicePage');
    Route::get('/admin/dashboard/bloggrid',[AdminPageController::class, 'displayBloggrid'])->name('adminBLogPage');
    Route::get('/admin/dashboard/blogdetail',[AdminPageController::class, 'displayBlogdetail'])->name('adminBLogdetailPage');
    Route::get('/admin/dashboard/teamdetail', [AdminPageController::class, 'displayteampage'])->name('adminTeamdetailpage');
    Route::get('/admin/dashboard/testimonial',[AdminPageController::class, 'displaytestimonial'])->name('admintestimonialpage');
    Route::get('/admin/dashboard/price',[AdminPageController::class,'displayprice'])->name('adminpricepage');
    //update Route

    Route::post('/admin/dashboard/update/{id}',[AdminPageController::class, 'aboutupdate'])->name('aboutupdate');
    Route::post('/admin/dashboard/courseupdate/{id}' , [AdminPageController::class, 'courseupdate'])->name('courseupdate');
    Route::post('/admin/dashboard/bloggridupdate/{id}', [AdminPageController::class, 'bloggridupdate'])->name('bloggirdupdate');
    Route::post('/admin/dashboard/teamupdate/{id}', [AdminPageController::class, 'teamupdate'])->name('teamupdate');
    Route::post('/admin/dashboard/testimonial/{id}', [AdminPageController::class, 'testimonialupdate'])->name('testimonialupdate');
    Route::post('/admin/dashboard/price/{id}', [AdminPageController::class , 'priceupdate'])->name('priceupdate');
   
    //Add page router

    Route::post('/admin/dashboard/addteam',[AdminPageController::class, 'addteammember'])->name('teammember');

    //delete route

    Route::post('/admin/dashboard/delete/{id}',[AdminPageController::class, 'destoryteammember'])->name('deleteuser');

    //export operation

    Route::get('/admin/dashboard/export',[AdminPageController::class, 'userExport'])->name('exportuser');
    Route::get('/admin/dashboard/export/single/{id}',[AdminPageController::class,'userExportSingle'])->name('exportusersingle');

    //

    Route::post('/admin/dashboard/import', [AdminPageController::class, 'userImport'])->name('importuser');

});



Route::get('/data',function()
{
  $userdata=Aboutpage::get();
  dd($userdata);
});


Route::get('/temp/slug',[PostController::class,'displayslugpage']);
Route::post('/temp/slug/add',[PostController::class,'addslug'])->name('addslug');
Route::get('/check_slug/{slug}',[PostController::class, 'getslug'])->name('check_slug');
