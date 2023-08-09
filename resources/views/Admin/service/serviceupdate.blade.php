@extends('Frontend.master-layout')


@section('nav-bar')
@include('Admin.dashboarditem.leftpanel')
@endsection


@section('body-containt')

@if($errors->any())
        @foreach($errors->all() as $error )
          <p style='color:red'>{{$error}}</p>
        
        @endforeach
    @endif

        @if(Session::has('success'))
        <p style='color:green; text-align:center'>{{Session::get('success')}}</p>
        @endif
      
      <div class="container"  style="margin-left:225px;margin-top:100px">
      
      <table class="table table-bordered" style="position:'auto'">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Course Name</th>
              <th scope="col">describe</th>
            </tr>
          </thead>
          @foreach($courselist as $value)
          <tbody>
            <tr>
              <td>{{$value->id}}</td>
              <td >{{$value->coursename}}</td>
              <td >{{$value->describe}}</td>
              <td>
 
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUser{{$value->id}}" data-id="{{$value->id}}">
                  update
              </button>

              @include('Admin.model.courseform')

              </td>
            </tr>
         </tbody>
         @endforeach
      </table>
     
      </div>

    

@endsection