@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
            </div>
        </div>

        <!-- /. ROW  -->
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table Example
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <a href="{{url('users/create')}}" class="btn btn-primary">Create User</a>
                            <button type="reset" class="btn btn-default">Delete User</button>
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#
                                            <label>Select All</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Hotel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>
                                            <label>1</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label></td>
                                        <td>{{$val->name}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>{{$val->email}}</td>
                                        <td>{{@$val->hotel()->name}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Edit</button>                                           
                                            <button type="button" class="btn btn-primary">Inactive/Active</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
