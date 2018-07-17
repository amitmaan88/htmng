@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row m-t10">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                <div class="btn-toolbarX">
                    <button type="reset" class="btn btn-danger pull-right m-r2">Delete User</button>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table Example
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th title="Select All">#
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label>
                                        </th>
                                        <th>Sr</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Hotel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $userType = staticDropdown("userType"); ?>
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label></td>
                                        <td>{{++$k + (($data->currentPage()-1) * $data->perPage())}}.</td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>{{$userType[$val->user_type_id]}}</td>
                                        <td>{{@$val->hotel()->name}}</td>
                                        <td>
                                            <a href="{{url('/users/'.$val->id.'/edit')}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                            <button type="button" class="btn btn-primary" id="actinc" data-var="0" data-id="{{$val->id}}">Active</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="pull-left">Total Records: {{$data->total()}}</div>
                            <div class="text-center">
                                <nav aria-label="Page navigation example">
                                    {{ $data->appends(Request::except('page'))->links() }}
                                </nav>
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
@endsection
