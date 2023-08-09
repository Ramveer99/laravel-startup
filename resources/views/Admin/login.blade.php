@extends('Frontend.master-layout')

@section('title')
Login Page
@endsection


@section('body-containt')

    @if($errors->any())
    @foreach($errors->all() as $error )
      <p style='color:red'>{{$error}}</p>
    
    @endforeach
    @endif
    
    @if(Session::has('error'))
     <p style='color:green; text-align:center'>{{Session::get('error')}}</p>
  
    @endif


    <div class="carousel-item active">
                    <img class="w-100" src="{{asset('img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
              <form action="{{route('userlogin')}}" method='POST'>
                     @csrf
 
                     <h1 style='color:white;'>Login Page</h1>
                 
                     <!-- Email section -->
                     <div class="form-group">
                       <label for=""></label>
                       <input type="email"  style='width:430px; text-align:center; margin-left:63px'
                         class="form-control" name="email" id="" aria-describedby="helpId" placeholder="Enter Email">
                     
                     </div>
   
                     <!-- Password -->
                
                     <div class="form-group">
                       <label for=""></label>
                       <input type="password" style='width:430px; text-align:center; margin-left:63px'
                         class="form-control" name="password" id="" aria-describedby="helpId" placeholder="Enter Password">
                          <div class="spancontaint" style='margin:20px'>
                          <a href="/forget-password" style='color:white;'> Forget password </a>
                          </div>
                       <button type='submit' style='margin-left:50px;font-size:20px;margin-bottom:20px'>Login</button>
                     </div> 
             
                     <a href="{{url('/register')}}" style='margin-left:400px;font-size:22px;color:white;'>you have not account</a>
                 </form>
         </div>
     </div>
  </div>
    
    


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