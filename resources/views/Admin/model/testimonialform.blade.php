
<!-- Modal -->
<div class="modal fade" id="edittestimonial{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Testimonial Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form id="edittestimonial" action="{{route('testimonialupdate',$value->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for=""></label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" value="{{$value->ClientName}}" placeholder="">
        </div>
     

      <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="department" id="" aria-describedby="helpId" value="{{$value->department}}" placeholder="Header">
      </div>

      <div class="form-group">
        <label for=""></label>
        
        <input type="text" class="form-control" name="description" id="" aria-describedby="helpId" value="{{$value->description}}" placeholder="Header" style="padding-bottom:60px">
      </div>

      <div class="form-group">
            <label for=""></label>
            <input type="file" id='file' class="form-control" name="image"  value="{{$value->image}}"  style="border:none;" >
            @if($value->image)
              <img src="{{ asset('storage/image/' .$value->image) }}" alt="Current Image" style="width:50px; height:60px; border-radius:40%; margin:3px">
            @endif
          </div>
    
   

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
      </div>
  </form>
    </div>
  </div>
</div>