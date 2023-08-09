@extends('Frontend.master-layout');

@section('body-containt')
<form action="{{route('addslug')}}" method="POST">
@csrf
<div class="container">
    <div class="card md-4">
<div class="form-group">
  
  <input type="text" class="form-control" name="tittle" id="tittle"  placeholder=" enter title">
  <br>
  <input type="text" class="form-control" name="slug" id="slug"  placeholder="slug">
  

  <button type="submit">Add slug</button>
</div>
  </div>
  </div>
</form>
@endsection


@section('jsquery')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>



   
        $('#tittle').keyup(function(e) {
            $.get('{{route('check_slug')}}',
                {'tittle': $('#tittle').val()},
                function(data) {
                    $('#slug').val(data.slug);
                });
        });
 
</script>
@endsection
