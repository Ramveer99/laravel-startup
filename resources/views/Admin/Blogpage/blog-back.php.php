@extends('Admin.master-layout')


@section('nav-bar')
@include('Admin.dashboarditem.leftpanel')

@endsection


@section('body-containt')


      
      <div class="container-xxl pt-7"  style="margin-left:260px;margin-top:100px">

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
      
      
    <table id="tab" class="table table-striped stripe row-border order-column" cellspacing="3" width="100%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Course</th>
      <th scope="col">Author</th>
      <th scope="col">Current Data</th>
      <th scope="col">Tittle</th>
      <th scope="col">about</th>
      <th scope="col">Slug</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach($userblog as $value)
  <tbody>
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->subject}}</td>
      <td>{{$value->author}}</td>
      <td>{{$value->current}}</td>
      <td>{{$value->tittle}}</td>
      <td>{{$value->about}}</td>
      <td>{{$value->slug}}</td>

      <td> <img src="{{asset('storage/image/'.$value->photo)}}" alt="" style="width:50px; height:60px; border-radius:40%; margin:3px"></td>

      <td>
        <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editblog{{$value->id}}" data-id="{{$value->id}}">
            Update
         </button>
       
      </td>

    </tr>
   
  </tbody>
  @endforeach
</table>
     
      </div>

@endsection
