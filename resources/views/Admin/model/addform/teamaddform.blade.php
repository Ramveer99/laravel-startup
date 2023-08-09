
<!-- Modal -->
<div class="modal fade" id="addteam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Team-Member Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form id="addteam" action="{{route('teammember')}}" method='POST' enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for=""></label>
          <input type="text" class="form-control" name="name" id="" aria-describedby="helpId"  placeholder="Team memeber Name">
        </div>
     

      <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="department" id="" aria-describedby="helpId" placeholder="Department">
      </div>

      <div class="form-group">
            <label for=""></label>
            <input type="file" id='file' class="form-control" name="image"   style="border:none;"  placeholder="Image">
          </div>
    
   

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add user</button>
            </div>
      </div>
  </form>
    </div>
  </div>
</div>