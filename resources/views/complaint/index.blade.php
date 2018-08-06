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
                        Complaints
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('complaint.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Title <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input class="form-control" name="complaint_title" id="complaint_title" type="text" value="{{old('complaint_title')}}"  />
                                        </div>
                                    </div>
                                    <?php $complaintType = staticDropdown("complaints", "Select"); ?>
                                    <div class="form-group form_field">
                                        <label>Type <span class="red">*</span></label>
                                        <select class="form-control" name="complaint_type" id="complaint_type">                                            
                                            @foreach($complaintType as $key=>$value)
                                            <option {{($key === old('complaint_type'))?Selected:""}} value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Detailed Complaint <span class="red">*</span></label>
                                        <textarea class="form-control" name="complaint_desc" id="complaint_desc">{{old('complaint_desc')}}</textarea>
                                    </div>                                    
                                    <div class="form-group form_field">
                                        <label>Upload Picture </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-upload"></i> 
                                            </div>
                                            <input type="file" class="form-control" name="complaint_pic" />
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Create" />
                                        <button id="cancelBtn" data-url="{{url('/complaint')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
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
