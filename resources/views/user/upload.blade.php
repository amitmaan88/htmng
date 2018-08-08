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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Bulk Upload
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('users.store')}}">
                            {{ csrf_field() }}
                                <div class="col-md-12">                                    
                                    <div class="form-group form_field">
                                        <label>Bulk  Users <span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_file" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="addusr" id="addusr" value="Create" />
                                        <button id="cancelBtn" data-url="{{url('/users')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('elements.error')
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('users.store')}}">
                            {{ csrf_field() }}
                                <div class="col-md-12">                                    
                                    <div class="form-group form_field">
                                        <label>Bulk  Rooms <span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_file" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="addusr" id="addusr" value="Create" />
                                        <button id="cancelBtn" data-url="{{url('/users')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
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
