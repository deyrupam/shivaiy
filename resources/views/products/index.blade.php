@extends('layout.app')


@section('body')
<style type="text/css">
	.btnadd{
    margin-left: 1155px;
}
</style>

<br>



 <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info btnadd" >Add Salon</button>

<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  $serial =1; ?>
   

   
  </tbody>
</table>
</div>



<!-- ADD Salon Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Salon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/add"  id="myform" method="post" enctype="multipart/form-data">
         <div class="row">
         <div class="col-md-6">
         	 <div class="form-group">
                <label for="exampleFormControlInput1">Salon Image</label>
                <input type="file"  name="imgpath" id="addimgInp" class="form-control changeval" >
              </div>
            <img src="" id="addimg" style="width: 80%; display: none;"   alt="Northern Lights">
        </div>
         <div class="col-md-6">
               <div class="form-group">
                <label for="exampleFormControlInput1">Salon Name</label>
                <input type="text" name="name"  class="form-control" id="name" >
                <span class="error name" style="display: none;">Please enter your salon name</span>
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Location</label>
                <input type="text" name="address"   class="form-control" id="address" >
                <span class="error address" style="display: none;">Please enter your salon location</span>
              </div>
         </div>
         </div>
      </form>
      </div>
      <div class="modal-footer">
        <input  type="submit" id="addbtn" class="btn btn-success" value="Add">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Salon Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Salon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/add"  id="editform" method="post" enctype="multipart/form-data">
         <div class="row">
         <div class="col-md-6">
         	 <div class="form-group">
                <label for="exampleFormControlInput1">Salon Image</label>
                <input type="file"  name="editimgpath" id="editimgInp" class="form-control changeval" >
              </div>
            <img src="" id="editimg" style="width: 80%; "   alt="Northern Lights">
        </div>
         <div class="col-md-6">
               <div class="form-group">
                <label for="exampleFormControlInput1">Salon Name</label>
                <input type="text" name="name"  class="form-control" id="editname" >
                <span class="error name" style="display: none;">Please enter your salon name</span>
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Location</label>
                <input type="text" name="address"  class="form-control" id="editaddress" >
                <input type="hidden" name="id" value="1">
                <input type="hidden" id="attribute">
                <span class="error address" style="display: none;">Please enter your salon location</span>
              </div>
         </div>
         </div>
      </form>
      </div>
      <div class="modal-footer">
        <input  type="submit" id="updatebtn" class="btn btn-success" value="Update">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- View Salon Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Salon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/add"  id="editform" method="post" enctype="multipart/form-data">
         <div class="row">
         <div class="col-md-6">
         	 
            <img src="" id="viewimg" style="width: 80%; "   alt="Northern Lights">
        </div>
         <div class="col-md-6">
               <div class="form-group">
                <label for="exampleFormControlInput1">Salon Name</label>
                <input type="text" name="name" disabled class="form-control" id="viewname" >
              </div>
               <div class="form-group">
                <label for="exampleFormControlInput1">Location</label>
                <input type="text" name="address" disabled class="form-control" id="viewaddress" >
              </div>
         </div>
         </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      Are you sure want to delete selected salon? 
      </div>
      <div class="modal-footer">
        <button type="button" id="deletebtn" class="btn btn-primary">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection