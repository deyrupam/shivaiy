@extends('layouts.mainlayout')

@section('content')
<div class="pageheader">
                        <h3><i class="fa fa-home"></i>Category / Sub </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Home </a> </li>
                                <li class="active"> footable </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Category</h3>
                                    </div>
                                    <!-- Foo Table - Pagination -->
                                    <!--===================================================-->
                                    <div class="panel-body">
                                        <label class="form-inline">
                                            Show
                                            <select id="demo-show-entries" class="form-control input-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                            entries
                                        </label>
                                        <table id="demo-foo-pagination" class="table toggle-arrow-small" data-page-size="5">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">Category Name</th>
                                                    <th>Option</th>
                                                    <th data-hide="all">Description</th>
                                                    <th data-hide="all">Published</th>
                                                    <th data-hide="all"></th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($category as $cate)
                                                <tr>
                                                    <td>{{ $cate->category_name }}</td>
                                                    <td><a href="#"> <i class="fa fa-edit"></i>edit</span> </a><a href="#"> <i class="fa fa-trash"></i>Delete</span> </a></td>
                                                    <td>{{ $cate->description }}</td>
                                                    <td>{{ $cate->created_at }}</td>
                                                    @if($cate->isactive==true)
                                                    <td><span class="label label-table label-success">Active</span></td>
                                                    @else
                                                    <td><span class="label label-table label-dark">Deactive</span></td>
                                                    @endif
                                                    
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="text-right">
                                                            <ul class="pagination"></ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!--===================================================-->
                                    <!-- End Foo Table - Pagination -->
                                </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Sub Category</h3>
                                    </div>
                                    <!-- Foo Table - Expand / Collapse All Rows -->
                                    <!--===================================================-->
                                    <div class="panel-body">
                                        <div class="pad-btm">
                                            <button id="demo-foo-collapse" class="btn btn-info">Collapse All</button>
                                            <button id="demo-foo-expand" class="btn btn-warning">Expand All</button>
                                        </div>
                                        <table id="demo-foo-col-exp" class="table toggle-arrow-small">
                                            <thead>
                                                <tr>
                                                    <th data-toggle="true">First Name</th>
                                                    <th>Last Name</th>
                                                    <th data-hide="all">Job Title</th>
                                                    <th data-hide="all">DOB</th>
                                                    <th data-hide="all">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Albert</td>
                                                    <td>Desouza</td>
                                                    <td>System Architect</td>
                                                    <td>22 Jun 1972</td>
                                                    <td><span class="label label-table label-success">Active</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Teresa </td>
                                                    <td>L. Doe</td>
                                                    <td>Pre-Sales Support</td>
                                                    <td>3 Oct 1981</td>
                                                    <td><span class="label label-table label-dark">Disabled</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Veronica </td>
                                                    <td>Gusikowski</td>
                                                    <td>Civil Engineer/td>
                                                    <td>19 Apr 1969</td>
                                                    <td><span class="label label-table label-danger">Suspended</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Bruce </td>
                                                    <td>Rogahn</td>
                                                    <td>CEO</td>
                                                    <td>13 Dec 1977</td>
                                                    <td><span class="label label-table label-success">Active</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Semantha</td>
                                                    <td>Halladay</td>
                                                    <td>Junior Technical Assistant</td>
                                                    <td>30 Dec 1991</td>
                                                    <td><span class="label label-table label-danger">Suspended</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Stevan </td>
                                                    <td>Hickle</td>
                                                    <td>Business Services Sales Representative</td>
                                                    <td>17 Oct 1987</td>
                                                    <td><span class="label label-table label-dark">Disabled</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Carolina </td>
                                                    <td>Hickle</td>
                                                    <td>Business Services Sales Representative</td>
                                                    <td>17 Oct 1987</td>
                                                    <td><span class="label label-table label-dark">Disabled</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--===================================================-->
                                    <!-- End Foo Table - Expand / Collapse All Rows -->
                                </div>
                                
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Sub Category</h3>
                            </div>
                            <div class="panel-body">
                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <label class="control-label">Status</label>
                                                    <select id="demo-foo-filter-status" class="form-control">
                                                        <option value="">Show all</option>
                                                        <option value="active">Active</option>
                                                        <option value="disabled">Disabled</option>
                                                        <option value="suspended">Suspended</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-xs-center text-right">
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Foo Table - Filtering -->
                                <!--===================================================-->
                                <table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">Sub Category</th>
                                            <th data-hide="phone, tablet">Category</th>
                                            <th data-hide="phone, tablet">published</th>
                                            
                                            <th data-hide="phone, tablet">Opertion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subcategory as $subcate)
                                        <tr>
                                            <td>{{ $subcate->name }}</td>
                                            <td>{{ $subcate->category->category_name}}</td>
                                            <td>{{ $subcate->created_at }}</td>
                                            
                                            <td><a href="#"> <i class="fa fa-edit"></i>edit</span> </a><a href="#"> <i class="fa fa-trash"></i>edit</span> </a></td>
                                            <td><span class="label label-table label-success">Active</span></td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!--===================================================-->
                                <!-- End Foo Table - Filtering -->
                            </div>
                        </div>
                        
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
 @endsection