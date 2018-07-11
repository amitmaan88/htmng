@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6">
                <h2>{{$pageHeading}}</h2>
            </div>
            <div class="col-md-6">
                <div class="btn-toolbar">
                    <a href="{{url('notice')}}" type="reset" class="btn btn-default pull-right">Refresh</a>
                    <a href="{{url('notice/template')}}" class="btn btn-primary pull-right">Create Template</a>                    
                </div>
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

                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th title="Select All">#
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label>
                                        </th>
                                        <th>Sr</th>
                                        <th>Room Name</th>                                        
                                        <th>Room Description</th>                                        
                                        <th>Hotel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $k=>$val)
                                    <tr>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label></td>
                                        <td>{{++$k}}.</td>
                                        <td>{{$val->room_name}}</td>                                        
                                        <td>{{@$val->hotel()->name}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Edit</button>
                                            <button type="button" class="btn btn-primary" id="actinc">Active</button>
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
