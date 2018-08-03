@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Room Type
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="{{route('room.rtype')}}">
                                {{ csrf_field() }}
                                <div class="col-md-9">
                                    <div class="form-group form_field">
                                        <label>Room Type <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input class="form-control" name="room_type" type="text" value="{{old('room_type')}}"  />
                                        </div>
                                    </div>                                                                                                            
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                        
                                        <input type="submit" class="btn btn-primary" value="Create" />
                                        <input type="button" id="cancelBtn" data-url="{{url('/room/roomtype')}}" class="btn btn-default" name="cancel" value="Cancel" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('elements.error')
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr>                                        
                                            <th class="col-md-1">S No.</th>
                                            <th class="col-md-8">Room Type</th>                                        
                                            <th class="col-md-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Status = staticDropdown("status"); ?>
                                        @foreach($data as $k=>$val)
                                        <tr class="gradeA {{($k%2==0?'even':'odd')}}">                                        
                                            <td class="col-md-1">{{++$k + (($data->currentPage()-1) * $data->perPage())}}.</td>
                                            <td class="col-md-8">{{$val->room_type}}</td>                                                                                
                                            <td class="col-md-3">
                                                <a href="{{url('/room/'.$val->id.'/rtedit')}}"><button type="button" class="btn btn-primary">Edit</button></a>
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
        </div>
    </div>

    <!-- /. PAGE INNER  -->
</div>
@endsection
