@extends('Frontend.master-layout')


@section('nav-bar')
@include('Admin.dashboarditem.leftpanel')
@endsection



@section('body-containt')
   <div class="container" style="margin:230px; margin-top:100px; position:'auto'; height: 400px; overflow-y:auto">
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
       
     
   <div class="card">
   <table class="table table-bordered"id="table" style="position:'auto'; border-collapse:collapse; height:300px; overflow-y: auto">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Client name</th>
      <th scope="col">department</th>
      <th scope="col">description</th>
      <th scope="col">Image</th>

    </tr>
  </thead>
  @foreach($clientdata as $value)
  <tbody>
    <tr>
      <td scope="col">{{$value->id}}</td>
      <td scope="col">{{$value->ClientName}}</td>
      <td scope="col">{{$value->department}}</td>
      <td scope="col">{{$value->description}}</td>
      <td scope="col"> <img src="{{asset('storage/image/'.$value->image)}}" alt="" style="width:50px; height:60px; border-radius:40%; margin:3px"></td>

      <td>
        <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edittestimonial{{$value->id}}" data-id="{{$value->id}}">
         <i class="far fa-edit text-white"></i> Update
         </button>
       
         @include('Admin.model.testimonialform')

      </td>

    </tr>
   
  </tbody>

  @endforeach
</table>
</div>
</div>
</div>
@endsection


@section('jquery')
<script>
  $(document).ready(function() {
    $('#table').DataTable();
   } );
 </script>
@stop