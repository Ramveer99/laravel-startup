<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="editblog{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bloggride Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
      <form id='editblog' action="{{route('bloggirdupdate', $value->id)}}" method="POST" enctype="multipart/form-data">
        @csrf 
           <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="subject" id="" aria-describedby="helpId" value="{{$value->subject}}" placeholder="">
           </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="authors" id="" aria-describedby="helpId" value="{{$value->author}}" placeholder="">
          </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="current" id="" aria-describedby="helpId" value="{{$value->current}}" placeholder="">
          </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="tittle" id="" aria-describedby="helpId" value="{{$value->tittle}}" placeholder="">
          </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="about" id="" aria-describedby="helpId" value="{{$value->about}}" placeholder="">
          </div>
          <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="slug" id="" aria-describedby="helpId" value="{{$value->slug}}" placeholder="slug">
          </div>

          
       
          <div class="form-group">
            <label for="image"></label>
            <input type="file" id='imagefile' class="form-control" name="image"  value="{{$value->photo}}"  style="border:none;"  >
           <div class="from-group">
            @if($value->photo)
              <img src="{{ asset('storage/image/' .$value->photo) }}" alt="Current Image" style="width:50px; height:60px; border-radius:40%; margin:3px">
            @endif
            </div>
          </div>
  
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Update</button>
           </div>

      </form>
    </div>
  </div>
</div>