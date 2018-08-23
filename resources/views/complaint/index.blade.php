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
                        Complaints
                    </div>
                    <div class="panel-body">
                        @if(auth()->user()->user_type_id === 2)
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
                                            @if(!empty($compSingledata))
                                            <input class="form-control" name="complaint_title" id="complaint_title" type="text" value="{{old('complaint_title', $compSingledata->complaint_title)}}"  />
                                            @else
                                            <input class="form-control" name="complaint_title" id="complaint_title" type="text" value="{{old('complaint_title')}}"  />
                                            @endif
                                        </div>
                                    </div>
                                    <?php 
                                    $complaintType = staticDropdown("complaints", "Select"); 
                                    $complaintTypeFlip = array_flip($complaintType);
                                    ?>
                                    <div class="form-group form_field">
                                        <label>Type <span class="red">*</span></label>
                                        <select class="form-control" name="complaint_type" id="complaint_type">                                            
                                            @foreach($complaintType as $key=>$value)
                                            @if(!empty($compSingledata))
                                            <option {{($key === old('complaint_type', $complaintTypeFlip[$compSingledata->complaint_type]))?"selected=selected":""}} value="{{$key}}">{{$value}}</option>
                                            @else
                                            <option {{($key === old('complaint_type'))?"selected=selected":""}} value="{{$key}}">{{$value}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Detailed Complaint <span class="red">*</span></label>
                                        @if(!empty($compSingledata))
                                        <textarea class="form-control" name="complaint_desc" id="complaint_desc">{{old('complaint_desc', $compSingledata->complaint_desc)}}</textarea>
                                        @else
                                        <textarea class="form-control" name="complaint_desc" id="complaint_desc">{{old('complaint_desc')}}</textarea>
                                        @endif
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
                        @endif
                        <div class="table-responsive">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="user_list" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                    <thead>
                                        <tr>                                            
                                            <th class="col-xs-2">S No.</th>
                                            <th class="col-xs-2">Complaint</th>
                                            <th class="col-xs-2">Complaint Type</th>
                                            <th class="col-xs-3">Description</th>                                            
                                            <th class="col-xs-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Status = staticDropdown("complaintStatus");
                                        ?>
                                        @foreach($data as $k=>$val)                                        
                                        <tr class="gradeA {{($k%2==0?'even':'odd')}}">
                                            <td class="col-xs-2">{{++$k}}.</td>
                                            <td class="col-xs-2">{{$val->complaint_title}}</td>
                                            <td class="col-xs-1">{{$val->complaint_type}}</td>
                                            <td class="col-xs-3">{{$val->complaint_desc}}</td>
                                            <td class="col-xs-3">
                                                <a href="{{url('/complaint/index/'.$val->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Edit</button></a>                           
                                                <select data-id='{{$val->id}}' class="form-control comp_status">                                 
                                                    @foreach($Status as $key=>$value)                                                    
                                                    @if((auth()->user()->user_type_id === 1 && ($key === 2  || $key === 5)) || (auth()->user()->user_type_id === 2 && ($key === 3  || $key === 4)))
                                                    <option {{($key === $val->status)?"selected=selected":""}} value="{{$key}}">{{$value}}</option>
                                                    @else
                                                    <option disabled="disabled" {{($key === $val->status)?"selected=selected":""}} value="{{$key}}">{{$value}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>                        
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
