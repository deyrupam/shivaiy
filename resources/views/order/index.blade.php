@extends('layouts.mainlayout')

@section('content')
<div class="pageheader">
                        <h3><i class="fa fa-home"></i> Order Table </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="#"> Home </a> </li>
                                <li class="active"> Order </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sample Toolbar</h3>
                            </div>
                            <!--Data Table-->
                            <!--===================================================-->
                            <div class="panel-body">
                                <div class="pad-btm form-inline">
                                    <div class="row">
                                        <div class="col-sm-6 table-toolbar-left">
                                            <div class="btn-group">
                                                
                                                <button class="btn btn-default"><i class="fa fa-print"></i></button>
                                                <button class="btn btn-default"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 table-toolbar-right">
                                            <div class="form-group">
                                                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                            </div>
                                            <div class="btn-group">
                                                <button class="btn btn-default"><i class="fa fa fa-cloud-download"></i></button>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                                                    <i class="fa fa-cog"></i>
                                                    <span class="caret"></span>
                                                    </button>
                                                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#">Action</a></li>
                                                        <li><a href="#">Another action</a></li>
                                                        <li><a href="#">Something else here</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Separated link</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Shipping Address</th>
                                                <th>Order Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Payment Type</th>
                                                <th>Tracking Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><div class="checkbox">
                                                    <!-- Inline Icon Checkboxes -->
                                                    <label class="form-checkbox form-icon active form-text">
                                                    <input type="checkbox"></label>
                                                   </div></td>
                                                <td>Steve N. Horton</td>
                                                <td>USA</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> April 22, 2016</span></td>
                                                <td>$45.00</td>
                                                <td>
                                                    <div class="label label-table label-success">Paid</div>
                                                </td>
                                                <td>COD</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                               <td><div class="checkbox">
                                                    <!-- Inline Icon Checkboxes -->
                                                    <label class="form-checkbox form-icon active form-text">
                                                    <input type="checkbox"></label>
                                                   </div></td>
                                                <td>Charles S Boyle</td>
                                                <td>Germany</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> April 24, 2016</span></td>
                                                <td>$245.30</td>
                                                <td>
                                                    <div class="label label-table label-dark">Unpaid</div>
                                                </td>
                                                <td>COD</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td><div class="checkbox">
                                                    <!-- Inline Icon Checkboxes -->
                                                    <label class="form-checkbox form-icon active form-text">
                                                    <input type="checkbox"></label>
                                                   </div></td>   
                                                <td>Lucy Doe</td>
                                                <td>USA</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> April 24, 2016</span></td>
                                                <td>$38.00</td>
                                                <td>
                                                    <div class="label label-table label-info">Shipped</div>
                                                </td>
                                                <td>COD</td>
                                                <td><i class="fa fa-plane"></i> CGX0089934571</td>
                                            </tr>
                                            <tr>
                                                <td><div class="checkbox">
                                                    <!-- Inline Icon Checkboxes -->
                                                    <label class="form-checkbox form-icon active form-text">
                                                    <input type="checkbox"></label>
                                                   </div></td>
                                                <td>Teresa L. Doe</td>
                                                <td>Britain</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> April 15, 2016</span></td>
                                                <td>$77.99</td>
                                                <td>
                                                    <div class="label label-table label-danger">Cancelled</div>
                                                </td>
                                                <td>COD</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td><div class="checkbox">
                                                    <!-- Inline Icon Checkboxes -->
                                                    <label class="form-checkbox form-icon active form-text">
                                                    <input type="checkbox"></label>
                                                   </div></td>
                                                <td>Teresa L. Doe</td>
                                                <td>Russia</td>
                                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> April 12, 2016</span></td>
                                                <td>$18.00</td>
                                                <td>
                                                    <div class="label label-table label-warning">Hold</div>
                                                </td>
                                                <td>COD</td>
                                                <td>-</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--===================================================-->
                            <!--End Data Table-->
                        </div>
                    </div>
                    @endsection