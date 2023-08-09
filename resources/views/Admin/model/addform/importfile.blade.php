
<!-- Modal -->
<div class="modal fade" id="teamimport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Team-Member import Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form id="teamimport" action="{{route('importuser')}}" method='POST' enctype="multipart/form-data">
      @csrf
      
         <div class="form-group">
            <label for=""></label>
            <input type="file" id='file' class="form-control" name="file"   style="border:none;"  placeholder="Image">
          </div>
    
   

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">import user</button>
            </div>
      </div>
  </form>
    </div>
  </div>
</div>