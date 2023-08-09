
<!-- Modal -->
<div class="modal fade" id="editprice{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Price Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
      <form id="editprice" action="{{route('priceupdate',$value->id)}}" method='POST' enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for=""></label>
          <input type="text" class="form-control" name="plan" id="" aria-describedby="helpId" value="{{$value->plan}}" placeholder="">
        </div>
     

      <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="planheading" id="" aria-describedby="helpId" value="{{$value->planheading}}" placeholder="Header">
      </div>

      <div class="form-group">
        <label for=""></label>
        
        <input type="text" class="form-control" name="price" id="" aria-describedby="helpId" value="{{$value->price}}" placeholder="Header" style="padding-bottom:60px">
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