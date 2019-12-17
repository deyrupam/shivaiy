@extends('layouts.mainlayout')

@section('content')
 <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Category/Subcategory</h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                
                                <li class="active"> Category/Subcategory</li>
                            </ol>
                        </div>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
<!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                          <div class="eq-height">
                            <div class="col-sm-6 eq-box-sm">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                           
                                        </div>
                                        <h3 class="panel-title">Edit Category</h3>
                                    </div>
                                    <!--Block Styled Form -->
                                    <!--===================================================-->
                                    <form method="post" action="{{ url('category/create') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" name="category-name" placeholder="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <input type="text" name="description" placeholder="Description" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <input type="text" name="status" class="form-control">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="panel-footer text-right">
                                            <button class="btn btn-info" type="submit">Save</button>
                                        </div>
                                    </form>
                                    <!--===================================================-->
                                    <!--End Block Styled Form -->
                                </div>
                            </div>
                            <div class="col-sm-6 eq-box-sm">
                                <div class="panel">
                                  
                                    <!--Horizontal Form-->
                                    <!--===================================================-->
                                    
                                    <!--===================================================-->
                                    <!--End Horizontal Form-->
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!--===================================================-->
 <!--End page content-->
 @endsection