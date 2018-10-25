@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                @include('elements.message')                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
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
                                            @if(!empty($data_txt))
                                            <input class="form-control" name="room_type" type="text" value="{{old('room_type', $data_txt[0]['room_type'])}}"  />
                                            <input name="id" type="hidden" value="{{$data_txt[0]['id']}}"  />
                                            <input name="old_room_type" type="hidden" value="{{$data_txt[0]['room_type']}}"  />
                                            @else
                                            <input class="form-control" name="room_type" type="text" value=""  />
                                            @endif                                            
                                        </div>
                                    </div>                                                                                                            
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                        
                                        <input type="submit" class="btn btn-primary" value="{{$button_txt}}" />
                                        <input type="button" id="cancelBtn" data-url="{{url('/room/roomtype')}}" class="btn btn-default" name="cancel" value="Cancel" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form_field">
                                        <label>Beds <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            @if(!empty($data_txt))
                                            <input type="number" class="form-control" name="bed_no" id="bed_no" value="{{old('bed_no', $data_txt[0]['bed_no'])}}" />
                                            @else
                                            <input type="number" class="form-control" name="bed_no" id="bed_no" value="{{old('bed_no')}}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form_field">
                                        <label>Daily Cost <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            @if(!empty($data_txt))
                                            <input maxlength="5" type="text" class="form-control" name="daily_cost" id="daily_cost" value="{{old('daily_cost', $data_txt[0]['daily_cost'])}}" />
                                            @else
                                            <input maxlength="5" type="text" class="form-control" name="daily_cost" id="daily_cost" value="{{old('daily_cost')}}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('elements.error')
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="room_type_list" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr>                                        
                                            <th class="col-xs-2">S No.</th>
                                            <th class="col-xs-5">Room Type</th>                                        
                                            <th class="col-xs-5">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $Status = staticDropdown("status"); ?>
                                        @foreach($data as $k=>$val)
                                        <tr class="gradeA {{($k%2==0?'even':'odd')}}">                                        
                                            <td class="col-xs-2">{{++$k + (($data->currentPage()-1) * $data->perPage())}}.</td>
                                            <td class="col-xs-5">{{$val->room_type}}</td>                                                                                
                                            <td class="col-xs-5">
                                                <a href="{{url('/room/roomtype/'.$val->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i>  Edit</button></a>
                                                <button type="button" class="btn btn-danger deleteBtn" data-id="{{$val->id}}"><i class="fa fa-btn fa-trash-o"></i> Delete</button>
                                                <button tab_stat="2" data-url="{{'/room'}}" type="button" class="btn {{($val->status == 1)?'btn-success':'btn-default'}} actinc" data-var="{{($val->status == 1)?0:1}}" data-id="{{$val->id}}">{{$Status[$val->status]}}</button>

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
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- /. PAGE INNER  -->
</div>
@endsection
