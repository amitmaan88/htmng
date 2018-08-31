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
                        Add 
                        @if (auth()->user()->user_type_id === 0)
                        User
                        @elseif (auth()->user()->user_type_id === 1)
                        Tenant
                        @else

                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('users.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Full Name <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i> 
                                            </div>
                                            <input class="form-control" name="name" type="text" value="{{old('name')}}"  />
                                        </div>
                                    </div>                                                                        
                                    <?php
                                    $userType = staticDropdown("userType", 'Select');
                                    if (auth()->user()->user_type_id === 0) {
                                        ?>
                                        <div class="form-group form_field">
                                            <label>User Type <span class="red">*</span></label>                                        
                                            <select class="form-control" name="user_type_id" id="user_type">
                                                @foreach($userType as $uk=>$uv)
                                                <option value="{{$uk}}" {{ (old('user_type_id')==1)?'selected="selected"':'' }} >{{$uv}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <?php } else { ?>
                                        <input type="hidden" name="user_type_id" value="2" />
                                    <?php } ?>
                                    @if(auth()->user()->user_type_id === 0)
                                    <div class="form-group form_field">
                                        <label>{{HOTEL_PG}} <span class="red">*</span></label>
                                        <select class="form-control" name="hotel_id" id="hotel_id">                                            
                                            <option value="">Select</option>
                                            @foreach($hotelData as $uk=>$uv)
                                            <option value="{{$uv->id}}" {{ (old('hotel_id')==$uv->id)?'selected="selected"':'' }} >{{$uv->hotel_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @else
                                    <input type="hidden" name="hotel_id" value="{{$hotel_id}}" />
                                    @endif
                                    <div class="form-group form_field">
                                        <label>Email<span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa">@</i> 
                                            </div>
                                            <input class="form-control" name="email" id="email" type="email" value="{{old('email')}}" />
                                        </div>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Password <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input class="form-control" name="password" type="password" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Confirm Password<span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input class="form-control" name="password_confirmation" id="cnf_pass" type="password" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Mobile No <span class="red">*</span> </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-mobile"></i> 
                                            </div>
                                            <input class="form-control" name="mobile" id="mobile" type="tel" maxlength="15" value="{{old('mobile')}}" />
                                        </div>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Landline</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone-square"></i> 
                                            </div>
                                            <input class="form-control" name="landline" id="landline" type="tel" maxlength="15" value="{{old('landline')}}" />
                                        </div>
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
                                        <label>Upload Photo Id</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-upload"></i> 
                                            </div>
                                            <input type="file" class="form-control" name="up_photo_id" />
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Current Address</label>                                        
                                        <textarea class="form-control" name="address" id="address">{{old('address')}}</textarea>                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Create" />
                                        <input type="button" id="cancelBtn" data-url="{{url('/users')}}" class="btn btn-white" name="cancel" value="Cancel" />
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
