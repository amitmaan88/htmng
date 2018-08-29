@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row m-t10">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                @include('elements.message')                
                <div class="btn-toolbarX">                    
                    <a href="{{url('users/create')}}" class="btn btn-primary pull-right m-r2"><i class="fa fa-btn fa-user"></i> Create User</a>
                    <form class="form-inline" role="form" method="get" action="{{route('users.index')}}">
                        <div class="form-group">
                            <input type="text" class="form-control form-rounded" id="search" name="s" placeholder="Search..." value="{{$s}}">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-btn fa-search"></i> Search</button>
                        <a href="{{url('/users')}}"><button type="button" class="btn btn-default"><i class="fa fa-btn fa-refresh"></i> Refresh </button></a>                        
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
                        User List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="user_list" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr>                                            
                                            <th class="col-xs-1">S No.</th>
                                            <th class="col-xs-2">Name</th>
                                            <th class="col-xs-1">Mobile</th>
                                            <th class="col-xs-2">Email</th>
                                            <th class="col-xs-1">User Type</th>                                            
                                            <th class="col-xs-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userType = staticDropdown("userType");
                                        $Status = staticDropdown("status");
                                        ?>
                                        @foreach($data as $k=>$val)
                                        <tr class="gradeA {{($k%2==0?'even':'odd')}}">
                                            <td class="col-xs-1">{{++$k + (($data->currentPage()-1) * $data->perPage())}}.</td>
                                            <td class="col-xs-2">{{ucfirst($val->name)}}</td>
                                            <td class="col-xs-1">{{$val->mobile}}</td>
                                            <td class="col-xs-2">{{$val->email}}</td>
                                            <td class="col-xs-1">{{$userType[$val->user_type_id]}}</td>                                            
                                            <td class="col-xs-3">
                                                <a href="{{url('/users/'.$val->id.'/edit')}}"><button type="button" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Edit</button></a>
                                                <button type="button" class="btn btn-danger deleteBtn" data-id="{{$val->id}}"><i class="fa fa-btn fa-trash-o"></i> Delete</button>
                                                <button data-url="{{'/users'}}" type="button" class="btn {{($val->status == 1)?'btn-success':'btn-default'}} actinc" data-var="{{($val->status == 1)?0:1}}" data-id="{{$val->id}}"> {{$Status[$val->status]}}</button>

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
