@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row m-t10">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                @include('elements.message')                
                <div class="btn-toolbarX"> 
                    <a href="{{url('room/create')}}" class="btn btn-primary pull-right"> Create Room</a> 
                    <form class="form-inline" role="form" method="get" action="{{route('room.index')}}">
                        <div class="form-group">
                            <input type="text" class="form-control form-rounded" id="search" name="s" placeholder="Search..." value="{{$s}}">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-btn fa-search"></i> Search</button>
                        <a href="{{url('/room')}}"><button type="button" class="btn btn-default"><i class="fa fa-btn fa-refresh"></i> Refresh </button></a>                                               
                    </form>
                </div>
            </div>
        </div>

        <!-- /. ROW  -->
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Rooms
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="room_list" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                <thead>
                                    <tr>                                        
                                        <th class="col-xs-2">Sr</th>
                                        <th class="col-xs-2">Room Name</th>                                                                                
                                        <th class="col-xs-5">Room Description</th>                                        
                                        <th class="col-xs-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $Status = staticDropdown("status"); ?>
                                    @foreach($data as $k=>$val)
                                    <tr class="gradeA {{($k%2==0?'even':'odd')}}">                                      
                                        <td class="col-xs-2">{{++$k}}.</td>
                                        <td class="col-xs-2">{{$val->room_name}}</td>                                                                                                             <td class="col-xs-5">
                                            <div class="col-xs-4"><label>Type:</label> {{$val->room_type}}</div><div class="col-xs-4"><label>Chairs:</label> {{$val->chair_no}}</div>                                            
                                            <div class="col-xs-4"><label>Tables:</label>{{$val->table_no}}</div><div class="col-xs-4"><label>Beds:</label>{{$val->bed_no}}</div>                      <div class="col-xs-4"><label>Floor:</label>{{$val->floor_no}}</div>
                                            <div class="col-xs-4"><label>Area:</label>{{$val->room_size}}</div><div class="col-xs-4"><label>Daily Cost:</label>{{$val->daily_cost}}</div>             

                                            <div class="col-xs-4"><label>Monthly Cost:</label>{{$val->monthly_cost}}</div><div class="col-xs-4"><label>Yearly Cost:</label>{{$val->yearly_cost}}</div>

                                            <div class="col-xs-12"><label>Other Details:</label> {{$val->description}}</div>
                                        </td>                                        
                                        <td class="col-xs-3">
                                            <a href="{{url('/room/'.$val->id.'/edit')}}"><button type="button" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Edit</button></a>
                                            <button type="button" class="btn btn-danger deleteBtn" data-id="{{$val->id}}"><i class="fa fa-btn fa-trash-o"></i> Delete</button>
                                            <button  tab_stat="1" data-url="{{'/room'}}" type="button" class="btn {{($val->status == 1)?'btn-success':'btn-default'}} actinc" data-var="{{($val->status == 1)?0:1}}" data-id="{{$val->id}}">{{$Status[$val->status]}}</button>
                                            
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
