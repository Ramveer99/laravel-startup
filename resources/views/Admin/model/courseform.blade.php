<!-- Button trigger modal -->


<!-- Modal -->

<div class="modal fade" id="editUser{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

   
  <form id='editUser' action="{{route('courseupdate', $value->id)}}" method="POST">
    @csrf 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Course Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
   
           <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="coursename" id="" aria-describedby="helpId" value="{{$value->coursename}}" placeholder="">
           </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text"
              class="form-control" name="describe" id="" aria-describedby="helpId" value="{{$value->describe}}" placeholder="">
          </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>

      
    </div>
    </form>
  </div>
</div>