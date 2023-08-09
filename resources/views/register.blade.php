@extends('Frontend.master-layout')
@section('title')
Registration page
@endsection


@section('body-containt')

@if($errors->any())
@foreach($errors->all() as $error )
  <p style='color:red'>{{$error}}</p>

@endforeach
@endif

<div class="carousel-item active">
                    <img class="w-100" src="{{asset('img/blog-2.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
 
          <form action="{{route('StudentRegister')}}" method='POST'>
              @csrf
           
                     <h1 style='color:white;'>Register page</h1>
                      <!-- Username -->       
                      <div class="form-group">
                          <label for=""></label>
                          <input type="text" style='width:430px; text-align:center; margin-left:113px' class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Username">
                      </div>      
                      <!-- Email section -->      
                      <div class="form-group">
                          <label for=""></label>
                          <input type="email" style='width:430px; text-align:center; margin-left:113px' class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Enter Email">
                      </div>
                      <!-- Password -->
                     <div class="form-group">
                          <label for=""></label>
                          <input type="password" style='width:430px; text-align:center; margin-left:113px' class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter Password">

                     </div>
                     <div class="form-group" style="margin:20px">
                     <button type='submit' style='font-size:20px;margin-bottom:11px'>Register</button>
                     </div>
               <a href="{{url('/')}}" style='margin-left:400px;font-size:22px;color:white;'>you have already account</a>
          </form>


</div>
</div>
</div>

@if(Session::has('success'))
 <p style='color:green; text-align:center'>{{Session::get('success')}}</p>
@endif
@endsection




@section('jsquery')
<script>
  var msg = '{{Session::get('error')}}';
  var exist= '{{Session::has('error')}}';
  if(exist)
  {
    alert(msg);
  }
</script>
@endsection