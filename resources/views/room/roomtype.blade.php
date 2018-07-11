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
                            <form role="form" method="post" action="{{route('room.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Room Type <span class="red">*</span></label>
                                        <input class="form-control" name="room_type" type="text" value="{{old('room_type')}}"  />
                                    </div>                                                                                                            
                                    <div class="form-group pull-right">
                                        <input type="submit" class="btn btn-primary" name="addrtype" id="addrtype" value="Create" />
                                        <button id="cancelBtn" data-url="{{url('/room/roomtype')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('elements.error')
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
                                        <th>Room Type</th>                                        
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
                        @include('elements.error')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /. PAGE INNER  -->
</div>
@endsection
