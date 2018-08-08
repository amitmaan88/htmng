@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>
                @include('elements.message')                
            </div>
        </div>        
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Hotel
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="get" enctype="multipart/form-data" action="{{route('index')}}">                                
                                <div class="col-md-12">                                                                        
                                    <div class="form-group">
                                        <label>Hotels <span class="red">*</span></label>
                                        <select class="form-control" name="hotel_name" id="hotel_name">                                            
                                            <option value="">Select</option>
                                            @foreach($hotelList as $uk=>$uv)
                                            <option value="{{$uv->id}}" {{ (old('hotel_name', $hotel_name)==$uv->id)?'selected="selected"':'' }} >{{$uv->hotel_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>
                            </form>
                        </div>                  
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Create Hotel
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('hotel.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Name <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-home"></i> 
                                            </div>
                                            @if(!empty($hotel_name))
                                            <input class="form-control" name="hotel_name" type="text" value="{{$data[0]['hotel_name']}}"  />
                                            <input name="id" type="hidden" value="{{$data[0]['id']}}"  />
                                            @else
                                            <input class="form-control" name="hotel_name" type="text" value="{{old('hotel_name')}}"  />
                                            @endif                                            
                                        </div>
                                    </div>                                   
                                    <div class="form-group form_field">
                                        <label>Contact No <span class="red">*</span> </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-mobile"></i> 
                                            </div>
                                            @if(!empty($hotel_name))
                                            <input class="form-control" name="mobile" id="mobile" type="tel" maxlength="15" value="{{$data[0]['mobile']}}" />                                                
                                            @else
                                            <input class="form-control" name="mobile" id="mobile" type="tel" maxlength="15" value="{{old('mobile')}}" />
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Status</label>                                        
                                        <select name="status" id="status" class="form-control">
                                            <?php $stat = staticDropdown("status"); ?>
                                            @foreach($stat as $uk=>$uv)
                                            @if(!empty($hotel_name))
                                            <option value="{{$uk}}" {{ ($data[0]['status'] == $uk)?'selected="selected"':'' }} >{{$uv}}</option>
                                            @else
                                            <option value="{{$uk}}" {{ (old('status') == $uk)?'selected="selected"':'' }} >{{$uv}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>                         
                                    <div class="form-group form_field">
                                        <label>Upload Photo</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-upload"></i> 
                                            </div>
                                            <input type="file" class="form-control" name="up_photo" />
                                        </div>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Address </label>                                        
                                        @if(!empty($hotel_name))
                                        <textarea class="form-control" name="hotel_address" id="hotel_address">{{$data[0]['hotel_address']}}</textarea>
                                        @else
                                        <textarea class="form-control" name="hotel_address" id="hotel_address">{{old('hotel_address')}}</textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if(!empty($hotel_name))
                                        <input type="submit" class="btn btn-primary" value="Update" />
                                        @else
                                        <input type="submit" class="btn btn-primary" value="Create" />
                                        @endif
                                        <input type="button" id="cancelBtn" data-url="{{url('/')}}" class="btn btn-white" name="cancel" value="Cancel" />
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
