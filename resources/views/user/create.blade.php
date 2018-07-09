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
                                            <option value="">Select</option>
                                            <option value="1">Owner</option>
                                            <option value="2">Tenant</option>
                                        </select>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Password <span class="red">*</span></label>
                                        <input class="form-control" name="password" type="password" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Mobile No <span class="red">*</span> </label>
                                        <input class="form-control" name="mobile" id="mob" type="tel" maxlength="15" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Upload Photo <span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_photo" />
                                    </div>


                                    <div class="form-group form_field">
                                        <label>Last Name</label>
                                        <input class="form-control" name="last_name" id="last_name" type="text" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Email<span class="red">*</span></label>
                                        <input class="form-control" name="email" id="email" type="email" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Confirm Password<span class="red">*</span></label>
                                        <input class="form-control" name="cnf_pass" id="cnf_pass" type="password" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Landline</label>
                                        <input class="form-control" name="landline" id="landline" type="tel" maxlength="15" value="" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Upload Photo Id<span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_photo_id" />
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
