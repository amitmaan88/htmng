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
                        Add User
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('users.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Full Name <span class="red">*</span></label>
                                        <input class="form-control" name="name" type="text" value="{{old('name')}}"  />
                                    </div>                                    
                                    <div class="form-group form_field">
                                        <label>User Type <span class="red">*</span></label>
                                        <select class="form-control" name="user_type_id" id="user_type">
                                            <?php $userType = staticDropdown("userType", 'Select'); ?>
                                            @foreach($userType as $uk=>$uv)
                                            <option value="{{$uk}}" {{ (old('user_type_id')==1)?'selected="selected"':'' }} >{{$uv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Email<span class="red">*</span></label>
                                        <input class="form-control" name="email" id="email" type="email" value="{{old('email')}}" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Password <span class="red">*</span></label>
                                        <input class="form-control" name="password" type="password" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Confirm Password<span class="red">*</span></label>
                                        <input class="form-control" name="password_confirmation" id="cnf_pass" type="password" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Mobile No <span class="red">*</span> </label>
                                        <input class="form-control" name="mobile" id="mobile" type="tel" maxlength="15" value="{{old('mobile')}}" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Landline</label>
                                        <input class="form-control" name="landline" id="landline" type="tel" maxlength="15" value="{{old('landline')}}" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Upload Photo</label>
                                        <input type="file" class="form-control" name="up_photo" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Upload Photo Id</label>
                                        <input type="file" class="form-control" name="up_photo_id" />
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="addusr" id="addusr" value="Create" />
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
