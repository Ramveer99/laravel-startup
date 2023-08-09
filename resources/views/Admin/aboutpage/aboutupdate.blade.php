@extends('Frontend.master-layout')


@section('nav-bar')
@include('Admin.dashboarditem.leftpanel')
@endsection


@section('body-containt')
      <div class="container-sm "  style="margin-left:230px;margin-top:100px; position:'auto';">

      @if ($errors->any())
    <div>
       
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
    </div>
@endif


      
      @if(Session::has('success'))
     <p style='color:green; text-align:center'>{{Session::get('success')}}</p>
  
    @endif

      @foreach($userdata as $value)
      {{$value->tittle}}

      <table class="table table-bordered" style="position:'auto'">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Tittle</th>
      <th scope="col">Heading</th>
      <th scope="col">Number</th>
      <th scope="col">Image</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->tittle}}</td>
      <td>{{$value->heading}}</td>
      <td>{{$value->number}}</td>
      <td> <img src="{{asset('storage/image/'.$value->image)}}" alt="" style="width:50px; height:60px; border-radius:40%; margin:3px"></td>

      <td>
        <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editabout{{$value->id}}" data-id="{{$value->id}}">
            Update
         </button>
       
         @include('Admin.model.aboutform')

      </td>

    </tr>
   
  </tbody>
</table>



      @endforeach
      </div>
     
@endsection