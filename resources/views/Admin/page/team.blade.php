@extends('Admin.masterlayout')


@section('nav-bar')
   @include('Admin.dashboarditem.leftpanel')
@stop

<!-- body section start -->
@section('body-containt')



<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-2.2.4/dt-1.10.13/fc-3.2.2/fh-3.1.2/r-2.1.0/sc-1.4.2/datatables.min.css" />
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#my-table').DataTable( {
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
<div  class="container-xxl pt-7"  style="margin-left:260px;margin-top:100px">
  <div class="card">
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
          <div class="add-member" style="text-align:center; margin:10px">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addteam" data-id="addteam">
               Add Team member 
            </button>
           </div>
        <div class="member-import" style="float:right; text-align:right; margin:5px;">
          
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#teamimport" data-id="teamimport">
               Import file
            </button>
          <button class="btn btn-primary" style="align:right">
             <a href="{{route('exportuser')}}" style="color:white">save document</a>
          </button>
        </div>

       <!-- <div class="row m-4">
      
            <div class="form-group">
              <input type="search" name="search" id="search" class="form-control" placeholder="Search by name">
            </div>
            <button id="searchButton" class="btn btn-primary">Search</button>
       
      </div> -->
       <!-- <div class="col-lg-5 col-md-6 col-sm-12 col-12 mx-auto my-2">
            <div class="input-group">
                <input type="search" class="form-control rounded-0" id="search" placeholder="Search here...">
            </div>
             Search Box 
      </div>  -->

        @include('Admin.model.addform.importfile')
         @include('Admin.model.addform.teamaddform')
         <div class="container">
  <div class="row">
   

         
            <table   id="my-table" class="table table-striped stripe row-border order-column" cellspacing="3" width="100%">
              <thead>
                <tr>
                  <th>id</th>
                  <th>name</th>
                  <th>department</th>
                  <th>Member profile</th>
                  <th>Type</th>
                  <th>action</th>
                  <th>action</th>
                  <th>Excel File</th>
                </tr>
              </thead>
              <tbody>
              @foreach($teamdata as $value)

                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->department}}</td>
                  <td> <img src="{{asset('storage/image/'.$value->photo)}}" alt="" style="width:50px; height:60px; border-radius:40%;"></td>
                  <td>{{$value->is_user}}</td>
                  <td>
                    <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editteam{{$value->id}}" data-id="{{$value->id}}">
                     <i class="far fa-edit text-white"></i>Update</button>
                  </td>
                   
                       <td>
                              <form action="{{route('deleteuser',$value->id)}}" method="POST"> 
                                 @csrf   
                                 <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt text-white"></i></button>
                              </form>
                        </td>

                        <td>
                        <button class="btn btn-primary" style="align:right">
                            <a href="{{route('exportusersingle',$value->id)}}" style="color:white"><i class='fas fa-file-excel text-white'></i> </a>
                        </button>
                        </td>
                </tr>   
                @endforeach
              </tbody>             
            </table>
            @include('Admin.model.teammemberform')
            </div>
            </div>
@endsection




