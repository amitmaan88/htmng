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
                                        <label>Room Name <span class="red">*</span></label>
                                        <input class="form-control" name="room_name" type="text" value="{{old('room_name')}}"  />
                                    </div>                                                                        
                                    <div class="form-group form_field">
                                        <label>Room Photo <span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_photo" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="addroom" id="addusr" value="Create" />
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
