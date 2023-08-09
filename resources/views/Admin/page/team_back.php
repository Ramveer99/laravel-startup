@extends('Frontend.master-layout')


@section('nav-bar')
   @include('Admin.dashboarditem.leftpanel')
@stop

<!-- body section start -->
@section('body-containt')
<div class="container-md py-5"  style="margin-left:280px; margin-top:100px; margin-right:0px; padding-left:0px; position:'auto'; height: 600px; overflow-y:auto;">
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
          <!-- table section start -->
         
            <table   id="table">
              <thead>
                <tr>
                   <th>id</th>
                  <th>name</th>
                  <th>department</th>
                  <th>Member profile</th>
                  <th>Type</th>
                  <th>option</th>
                  <th>option</th>
                </tr>
              </thead>
              @foreach($teamdata as $value)
              <tbody>
                <tr>
                  <td>{{$value->id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->department}}</td>
                  <td> <img src="{{asset('storage/image/'.$value->photo)}}" name="image" alt="" style="width:50px; height:60px; border-radius:40%;"></td>
                  <td>{{$value->is_user}}</td>
                  <td>
                    <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" name="bupdate" data-target="#editteam{{$value->id}}" data-id="{{$value->id}}">
                     <i class="far fa-edit text-white"></i>Update
                     </button>
                     @include('Admin.model.teammemberform')
                  </td>
                       <td style="border:none">
                              <form action="{{route('deleteuser',$value->id)}}" method="POST"> 
                                 @csrf   
                                 <button type="submit" class="btn btn-danger" name="bdelete"> <i class="far fa-trash-alt text-white"></i></button>
                              </form>
                         </td>
                  
                </tr>   
              </tbody>
             @endforeach
            
            

               </div>
            </div>   
          
            </table>
         

            

   <!-- table section end -->
 
</div>
</div>

@endsection



@section('jsquery')

<!-- <script>
     
     $(document).ready(function (e) {
         console.log('Initializing DataTables');
         $('#table').DataTable({
             
             "searching": true // Enable searching

         });
     });
 </script> -->
 <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script>
  $(document).ready(function (){
  // let table = new DataTable('#table');
   $('#table').DataTable(
    {
      "lengthMenu": [5, 15, 40, 800],

      // columns: [
      //       {"name": "id", data: "id"},
      //       {"name": "name", data: "name"},
      //       {"name": "department", data: "department"},
      //       {"name":"image", data:"Member profile"},
      //       {"name":"is_user", data:"type"},
      //       {"name":"bupdate", data:"option"},
      //       {"name":"bdelete", data:"option"}
      //   ],
    }
   );
   
  });
 </script>

@stop


