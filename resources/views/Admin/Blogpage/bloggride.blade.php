
@extends('Admin.masterlayout')


@section('nav-bar')
@include('Admin.dashboarditem.leftpanel')

@endsection


@section('body-containt')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.13/fc-3.2.2/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.min.css" />
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#tab').DataTable( {
        scrollY:        "400px",
        scrollX:        true,
        scrollCollapse: false,
        paging:         false,
        fixedColumns:   {
            leftColumns: 1,
        }
    } );
});
</script>
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
                <th>id</th>
                <th>Subject</th>
                <th>Author</th>
                <th>Current data</th>
                <th>tittle</th>
                <th>About</th>
                <th>Slug</th>
                <th>Image</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>

        @foreach($userblog as $value)
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
        @endforeach
        </tbody>
    </table>
    @include('Admin.model.bloggridform')
</div>

@endsection
