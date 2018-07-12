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
                        Add Rooms
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('room.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Room <span class="red">*</span></label>
                                        <input class="form-control" name="room_name" type="text" value="{{old('room_name')}}"  />
                                    </div>                                                                        
                                    <div class="form-group form_field">
                                        <label>Room Photo <span class="red">*</span></label>
                                        <input type="file" class="form-control" name="room_photo" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Room Type <span class="red">*</span></label>
                                        <select class="form-control" name="room_type" id="room_type">
                                            <option value="">Select</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Chairs <span class="red">*</span></label>
                                        <input type="number" class="form-control" name="chairs" id="chairs" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Tables <span class="red">*</span></label>
                                        <input type="number" class="form-control" name="tables" id="tables" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Beds <span class="red">*</span></label>
                                        <input type="number" class="form-control" name="beds" id="beds" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Size <span class="red">*</span></label>
                                        <input type="number" class="form-control" name="room_size" id="room_size" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Floor No. <span class="red">*</span></label>
                                        <input type="number" class="form-control" name="floor_no" id="floor_no" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form_field">
                                        <label>Daily Cost <span class="red">*</span></label>
                                        <input type="number" class="form-control" name="cost" id="cost" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Other Facilities <span class="red">*</span></label>
                                        <textarea name="facility" id="facility" class="form-control"></textarea>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="addroom" id="addroom" value="Create" />
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
