@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row m-t10">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                <div class="btn-toolbarX">                    
                    <a href="{{url('users/create')}}" class="btn btn-primary pull-right m-r2">Create User</a>
                    <form class="form-inline" role="form" method="get" action="{{route('users.index')}}">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" name="s" placeholder="Search..." value="{{$s}}">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                        <input type="button" id="cancelBtn" data-url="{{url('/users')}}" class="btn btn-default" name="cancel" value="Reset" />
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- /. ROW  -->
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table Example
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr role="row">                                            
                                            <th>S No.</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            <th>Hotel</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userType = staticDropdown("userType");
                                        $Status = staticDropdown("status");
                                        ?>
                                        @foreach($data as $k=>$val)
                                        <tr>                                            
                                            <td>{{++$k + (($data->currentPage()-1) * $data->perPage())}}.</td>
                                            <td>{{$val->name}}</td>
                                            <td>{{$val->mobile}}</td>
                                            <td>{{$val->email}}</td>
                                            <td>{{$userType[$val->user_type_id]}}</td>
                                            <td>{{@$val->hotel()->name}}</td>
                                            <td>
                                                <a href="{{url('/users/'.$val->id.'/edit')}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                                <button type="button" class="btn btn-primary" id="actinc" data-var="{{($val->status == 1)?0:1}}" data-id="{{$val->id}}">{{$Status[$val->status]}}</button>
                                                <button type="button" class="btn btn-danger" data-id="{{$val->id}}" id="deleteBtn">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6"><div role="alert" aria-live="polite" aria-relevant="all">Total Records: {{$data->total()}}</div></div>
                                    <div class="col-md-6">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">{{ $data->appends(Request::except('page'))->links() }}
                                        </div>
                                    </div>
                                </div>                                                                    
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
</div>
@endsection
