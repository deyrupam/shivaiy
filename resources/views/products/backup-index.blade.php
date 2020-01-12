@extends('layout.product')
@section('body')
<style type="text/css">
  .addbtn{
   font-size: 14px !important;
 }
 .error{
  color: red;
  font-size: 13px;
}
.alert-warning,.alert-success
{ 
    display: none;
    position: fixed;
    max-width: 50%; 
    width: 100%; 
    height: 50px;
    margin: auto;   
    top: 25%;   
    left: 16%;    
    z-index: 111111;     
    box-shadow: 1px 1px 8px rgba(0, 0, 0, 0.15);     
    text-align: center;     
    right: 0;    
} 
</style>

<div class="alert alert-success msgbox">
<strong><center class="message"></center></strong>  
</div>

<div class="container-fluid">
  <div class="row">
   <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
   <div>
    <table class="table table-dark">
      <thead>
        <tr>
         <th>S.No          </th>
         <th>Image         </th>
         <th>Category      </th>
         <th>Sub-Category  </th>
         <th>Name          </th>
         <th>Title         </th>
         <th>Description   </th>
         <th>Weight        </th>
         <th>Sku           </th>
         <th>Price         </th>
         <th>Selling Price </th>
         <th>Stock         </th>
         <th>Action        </th>
         <th><button type="button" data-toggle="modal" data-target="#AddModal" form_key="add" class="btn btn-success addbtn">Add-New</button></th>
       </tr>
     </thead>
     <tbody class="product-list">
      @if($products)
      <?php $serial = 1; ?>
      @foreach($products as $product)
      <tr>
        <td scope="row">{{ $serial++ }}</td>
        <td><a href="javascript:void(0)" data-toggle="modal" data-target="#lightboxModal"><img src="{{ url('/') }}/uploads/{{ $product->image }}"  alt="Cinque Terre" width="50" height="50" style="border-radius: 50%;"></a></td>
        <td>{{ $product->category }}</td>
        <td>{{ $product->sub_category }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->product_short_desc }}</td>
        <td>{{ $product->product_desc }}</td>
        <td>{{ $product->product_weight }}</td>
        <td>{{ $product->product_sku }}</td>
        <td>{{ $product->product_org_price }}</td>
        <td>{{ $product->product_selling_price }}</td>
        <td>{{ $product->product_stock }}</td>
        <td><a href="javascript:void(0)" form_key="edit" product_id="{{ $product->id }}" data-toggle="modal" id="editbtn" data-target="#EditModal"><i class="fas fa-edit"  style="color:black;"></i></a>
          <a href="javascript:void(0)" data-toggle="modal" form_key="view" product_id="{{ $product->id }}" id="viewbtn" data-target="#ViewModal"><i class="fas fa-eye" ></i></a>
          <a href="javascript:void(0)" product_id="{{ $product->id }}" data-toggle="modal" id="delbtn" data-target="#deletemodal"><i class="fa fa-trash" style="color:black;"></i></a>
        </td>

      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
</div>



<!-- ADD Product Modal -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-xl" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form action="/add"  id="addform" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" name="product_name" class="form-control add_product_name" >
            <span class="error" style="display: none;">Please enter your product name</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="product_short_desc"   class="form-control add_product_short_desc">
            <span class="error" style="display: none;">Please enter your title </span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" name="product_desc"   class="form-control add_product_desc">
            <span class="error" style="display: none;">Please enter your description</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Weight</label>
            <input type="number" name="product_weight" class="form-control add_product_weight">
            <span class="error" style="display: none;">Please enter your product weight</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Sku</label>
            <input type="text" name="product_sku"   class="form-control add_product_sku">
            <span class="error" style="display: none;">Please enter your product sku</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">In stock</label>
            <input type="text" name="product_stock"   class="form-control add_product_stock">
            <span class="error" style="display: none;">Please enter how much product in stock</span>
          </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
           <label for="exampleFormControlInput1">Product Images</label>
           <input type="file"  name="imgpath[]" multiple id="addimgInp" class="form-control add_addimgInp">
           <span class="error" style="display: none;">Please select atleast one image</span>
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Original Price</label>
           <input type="text" name="product_org_price"   class="form-control add_product_org_price" >
           <span class="error" style="display: none;">Please enter your product price</span>
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Selling Price</label>
           <input type="text" name="product_selling_price"   class="form-control add_product_org_price">
           <span class="error" style="display: none;">Please enter your product selling price</span>
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Category</label>
           <select class="form-control cat-drop add_category_id" name="category_id">
            <option value="">Select Category</option>
            @if($categories)
            @foreach($categories as $category)
            <option value="{{ $category->id }}">
             {{ $category->category_name }}
           </option>
           @endforeach
           @endif
         </select>
         <span class="error" style="display: none;">Please select category</span>
       </div>
       <div class="form-group sub-cat-div" style="display: none;">
         <label for="exampleFormControlInput1">Sub-Category</label>
         <select class="form-control sub-cat-drop add_sub_category_id" name="sub_category_id">
          <option value="" selected>Select Sub-category</option>
        </select>
         <span class="error" style="display: none;">Please select sub-category</span>
      </div>
    </div>
  </div>
</form>
</div>
<div class="modal-footer">
 <input  type="submit" form_key="add" class="btn btn-success addpro" value="Add">
 <button type="button" class="btn btn-secondary clo-mod" data-dismiss="modal">
 Close</button>
</div>
</div>
</div>
</div>  


<!-- LightBox Modal -->
<!--begin modal window-->
<div class="modal fade" id="lightboxModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="pull-left">My Gallery Title</div>
<button type="button" class="close" data-dismiss="modal" title="Close"> <span class="glyphicon glyphicon-remove"></span></button>
</div>
<div class="modal-body">

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="http://127.0.0.1:8000/uploads/testing.webp" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="http://127.0.0.1:8000/uploads/testing.webp" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="http://127.0.0.1:8000/uploads/testing.webp" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<!--CAROUSEL CODE GOES HERE-->

<!--end modal-body--></div>
<div class="modal-footer">
<div class="pull-left">
<small>Photographs by <a href="https://placeimg.com" target="new">placeimg.com</a></small>
</div>
<button class="btn-sm close" type="button" data-dismiss="modal">Close</button>
<!--end modal-footer--></div>
<!--end modal-content--></div>
<!--end modal-dialoge--></div>
<!--end myModal-->></div>



<!-- View Product Modal -->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-xl" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="ViewModalLabel">View Product Detail</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form action="/add" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input disabled="disabled"  type="text" name="product_name"  class="form-control view_product_name" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input disabled="disabled" type="text" name="product_short_desc"   class="form-control view_product_short_desc">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input disabled="disabled" type="text" name="product_desc"   class="form-control view_product_desc">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Weight</label>
            <input disabled="disabled" type="number" name="product_weight" class="form-control view_product_weight" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Sku</label>
            <input disabled="disabled" type="text" name="product_sku"   class="form-control view_product_sku">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleFormControlInput1">In stock</label>
            <input disabled="disabled" type="text" name="product_stock"   class="form-control view_product_stock">
          </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Original Price</label>
           <input disabled="disabled" type="text" name="product_org_price"   class="form-control view_product_org_price" >
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Selling Price</label>
           <input disabled="disabled" type="text" name="product_selling_price"   class="form-control view_product_selling_price">
         </div>
         <div class="form-group">
             <label for="exampleFormControlInput1">Category</label>
             <select disabled=disabled class="form-control cat-drop view_category_id" name="category_id">
              <option value="">Select Category</option>
              @if($categories)
              @foreach($categories as $category)
              <option value="{{ $category->id }}">
               {{ $category->category_name }}
             </option>
             @endforeach
             @endif
           </select>
         </div>
         <div class="form-group sub-cat-div">
            <label for="exampleFormControlInput1">Sub-Category</label>
            <select disabled=disabled class="form-control sub-cat-drop view_sub_category_id" name="sub_category_id">
            </select>
         </div>
        
    </div>
  </div>
</form>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary clo-mod" data-dismiss="modal">
 Close</button>
</div>
</div>
</div>
</div> 



<!-- Edit Product Modal -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-xl" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form action="/update"  id="updateform" method="post" enctype="multipart/form-data">
           <input type="hidden" name="id">
        <div class="row">
          <div class="col-md-6">
           <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="text" name="product_name" class="form-control edit_product_name" >
            <span class="error" style="display: none;">Please enter your product name</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="product_short_desc"   class="form-control edit_product_short_desc">
            <span class="error" style="display: none;">Please enter your title </span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" name="product_desc"   class="form-control edit_product_desc">
            <span class="error" style="display: none;">Please enter your description</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Weight</label>
            <input type="number" name="product_weight" class="form-control edit_product_weight">
            <span class="error" style="display: none;">Please enter your product weight</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Product Sku</label>
            <input type="text" name="product_sku"   class="form-control edit_product_sku">
            <span class="error" style="display: none;">Please enter your product sku</span>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">In stock</label>
            <input type="text" name="product_stock"   class="form-control edit_product_stock">
            <span class="error" style="display: none;">Please enter how much product in stock</span>
          </div>
        </div>
        <div class="col-md-6">
         <div class="form-group">
           <label for="exampleFormControlInput1">Product Images</label>
           <input type="file"  name="imgpath[]" multiple id="addimgInp" class="form-control">
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Original Price</label>
           <input type="text" name="product_org_price"   class="form-control edit_product_org_price" >
           <span class="error" style="display: none;">Please enter your product price</span>
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Selling Price</label>
           <input type="text" name="product_selling_price"   class="form-control edit_product_selling_price">
           <span class="error" style="display: none;">Please enter your product selling price</span>
         </div>
         <div class="form-group">
           <label for="exampleFormControlInput1">Category</label>
           <select class="form-control cat-drop edit_category_id" name="category_id">
            <option value="">Select Category</option>
            @if($categories)
            @foreach($categories as $category)
            <option value="{{ $category->id }}">
             {{ $category->category_name }}
           </option>
           @endforeach
           @endif
         </select>
         <span class="error" style="display: none;">Please select category</span>
       </div>
       <div class="form-group sub-cat-div">
         <label for="exampleFormControlInput1">Sub-Category</label>
         <select class="form-control sub-cat-drop edit_sub_category_id" name="sub_category_id">
          <option value="" selected>Select Sub-category</option>
        </select>
      </div>
    </div>
  </div>
</form>
</div>
<div class="modal-footer">
 <input  type="submit" form_key="edit" class="btn btn-success updatepro" value="Update">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">
 Close</button>
</div>
</div>
</div>
</div>  




@endsection