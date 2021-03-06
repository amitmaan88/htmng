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
                        Update Rooms
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{ route('room.update', $data->id) }}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Room <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input class="form-control" name="room_name" type="text" value="{{old('room_name',$data->room_name)}}"  />
                                        </div>
                                    </div>                                                                        
                                    <div class="form-group form_field">
                                        <label>Room Photo <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input type="file" class="form-control" name="room_photo" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Room Type <span class="red">*</span></label>
                                        <select class="form-control" name="room_type" id="room_type">
                                            <option value="">Select</option>                                            
                                            @foreach($type as $key=>$value)
                                            <option {{ (old('room_type',$data->room_type)==$value->id)?'selected=selected':"" }} value="{{$value->id}}">{{$value->room_type}}</option>
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Chairs <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input type="number" class="form-control" name="chair_no" id="chair_no" value="{{old('chair_no',$data->chair_no)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Tables <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input type="number" class="form-control" name="table_no" id="table_no" value="{{old('table_no',$data->table_no)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Beds <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input type="number" class="form-control" name="bed_no" id="bed_no" value="{{old('bed_no',$data->bed_no)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Area <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input maxlength="5" type="text" class="form-control" name="room_size" id="room_size" value="{{old('room_size',$data->room_size)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Floor No. <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input type="number" class="form-control" name="floor_no" id="floor_no" value="{{old('floor_no',$data->floor_no)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Daily Cost <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input maxlength="5" type="text" class="form-control" name="daily_cost" id="daily_cost" value="{{old('daily_cost',$data->daily_cost)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Monthly Cost <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input maxlength="5" type="text" class="form-control" name="monthly_cost" id="monthly_cost" value="{{old('monthly_cost',$data->monthly_cost)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Yearly Cost <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input maxlength="5" type="text" class="form-control" name="yearly_cost" id="yearly_cost" value="{{old('yearly_cost',$data->yearly_cost)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Other Facilities <span class="red">*</span></label>
                                        <textarea name="description" id="description" class="form-control"> {{old('description',$data->description)}}</textarea>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <button id="cancelBtn" data-url="{{url('/room')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('elements.error')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /. PAGE INNER  -->
</div>
@endsection
