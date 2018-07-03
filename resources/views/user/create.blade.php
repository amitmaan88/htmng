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
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('users.index')}}">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label>First Name<span class="red">*</span></label>
                                        <input class="form-control" name="first_name" id="first_name" type="text" value="" required="required" />
                                        <p class="help-block"></p>
                                    </div>                          
                                    <div class="form-group">
                                        <label>User Type<span class="red">*</span></label>
                                        <select class="form-control" name="user_type" id="user_type">
                                            <option value="">Select</option>                                            
                                            <option value="1">Owner</option>                                            
                                            <option value="2">Tenant</option>                                            
                                        </select>
                                        <p class="help-block"></p>
                                    </div>                                                                        
                                    <div class="form-group">
                                        <label>Password<span class="red">*</span></label>
                                        <input class="form-control" name="pass" id="pass" type="password" value="" />
                                        <p class="help-block"></p>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Mobile No<span class="red">*</span> </label>
                                        <input class="form-control" name="mob" id="mob" type="tel" maxlength="15" value="" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Photo<span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_photo" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="submit" class="btn btn-primary" name="addusr" id="addusr" value="Create" />
                                        <input type="submit" class="btn btn-default" name="cancelusr" id="cancelusr" value="Cancel" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="last_name" id="last_name" type="text" value="" />
                                        <p class="help-block"></p>
                                    </div>                                    
                                    <div class="form-group">
                                        <label>Email<span class="red">*</span></label>
                                        <input class="form-control" name="email" id="email" type="email" value="" />
                                        <p class="help-block"></p>
                                    </div>                                                                                                            
                                    <div class="form-group">
                                        <label>Confirm Password<span class="red">*</span></label>
                                        <input class="form-control" name="cnf_pass" id="cnf_pass" type="password" value="" />
                                        <p class="help-block"></p>
                                    </div>                                                                                                            
                                    <div class="form-group">
                                        <label>Landline</label>
                                        <input class="form-control" name="landline" id="landline" type="tel" maxlength="15" value="" />
                                        <p class="help-block"></p>
                                    </div>                                                                                                            
                                    <div class="form-group">
                                        <label>Upload Photo Id<span class="red">*</span></label>
                                        <input type="file" class="form-control" name="up_photo_id" />
                                        <p class="help-block"></p>
                                    </div>                                                                        
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="clearfix"></div>
    @include('elements.error')
    <!-- /. PAGE INNER  -->
</div>
@endsection
