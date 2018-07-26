@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row m-t10">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                <div class="btn-toolbarX"> 
                    <a href="{{url('room/create')}}" class="btn btn-primary pull-right">Create Room</a> 
                    <form class="form-inline" role="form" method="get" action="{{route('room.index')}}">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search" name="s" placeholder="Search..." value="{{$s}}">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                        <input type="button" id="cancelBtn" data-url="{{url('/room')}}" class="btn btn-default" name="cancel" value="Reset" />
                    </form>
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
                                    <tr class="d-flex">                                        
                                        <th class="col-xs-1">Sr</th>
                                        <th class="col-xs-2">Room Name</th>                                                                                
                                        <th class="col-xs-6">Room Description</th>                                        
                                        <th class="col-xs-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $Status = staticDropdown("status"); ?>
                                    @foreach($data as $k=>$val)
                                    <tr class="d-flex">                                       
                                        <td class="col-xs-1">{{++$k}}.</td>
                                        <td class="col-xs-2">{{$val->room_name}}</td>                                                                                                             <td class="col-xs-6">
                                            <div class="col-sm-4"><label>Type:</label> {{$val->room_type}}</div><div class="col-sm-4"><label>Chairs:</label> {{$val->chair_no}}</div>                                            
                                            <div class="col-sm-4"><label>Tables:</label>{{$val->table_no}}</div><div class="col-sm-4"><label>Beds:</label>{{$val->bed_no}}</div>                      <div class="col-sm-4"><label>Floor:</label>{{$val->floor_no}}</div>
                                            <div class="col-sm-4"><label>Area:</label>{{$val->room_size}}</div><div class="col-sm-4"><label>Daily Cost:</label>{{$val->daily_cost}}</div>             

                                            <div class="col-sm-4"><label>Monthly Cost:</label>{{$val->monthly_cost}}</div><div class="col-sm-4"><label>Yearly Cost:</label>{{$val->yearly_cost}}</div>

                                            <div class="col-sm-8"><label>Other Details:</label> {{$val->description}}</div>
                                        </td>                                        
                                        <td class="col-xs-6">
                                            <a href="{{url('/room/'.$val->id.'/edit')}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                            <button type="button" class="btn btn-primary actinc" data-var="{{($val->status == 1)?0:1}}" data-id="{{$val->id}}">{{$Status[$val->status]}}</button>
                                            <button type="button" class="btn btn-danger deleteBtn" data-id="{{$val->id}}">Delete</button>
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
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection
