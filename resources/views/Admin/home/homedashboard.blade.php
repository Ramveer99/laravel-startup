@extends('Frontend.master-layout')


@section('nav-bar')
@include('Admin.dashboarditem.leftpanel')
@endsection

@section('body-containt')
<!-- <div class="container-sm "  style="margin-left:230px;margin-top:100px; position:'auto';"> -->

<div class="container-fluid facts py-5 pt-lg-0"  style="margin-left:230px;margin-top:100px; position:'auto';">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s" style="margin:20px">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 120px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 30px; height: 30px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Total Course</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$userdata}}</h1>
                        </div>
                    </div>
                </div>
         


                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s" style="margin:20px">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 120px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 30px; height: 30px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Total Client</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$clientdata}}</h1>
                        </div>
                    </div>
                </div>
 
                


           
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s" style=" margin:20px">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 120px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 30px; height: 30px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Total blog Course</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$usercourse}}</h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s" style=" margin:20px">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 120px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 30px; height: 30px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Total plan of courses</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{$userprice}}</h1>
                        </div>
                    </div>
                </div>


                
            </div>
        <div>  
        </div>  
</div>
@endsection