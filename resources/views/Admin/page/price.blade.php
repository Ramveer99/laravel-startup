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

     

      <table class="table table-bordered" style="position:'auto'">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Plan</th>
      <th scope="col">Type of plan</th>
      <th scope="col">Price</th>

    </tr>
  </thead>
  @foreach($userprice as $value)
  <tbody>
    <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->plan}}</td>
      <td>{{$value->planheading}}</td>
      <td>{{$value->price}}</td>

      <td>
        <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editprice{{$value->id}}" data-id="{{$value->id}}">
            Update
         </button>
       
         @include('Admin.model.priceform')

      </td>

    </tr>
   
  </tbody>

  @endforeach
</table>
      </div>


</div>
@endsection