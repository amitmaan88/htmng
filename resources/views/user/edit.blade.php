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
                        <h5>Please Update below fields</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{ route('users.update', $data->id) }}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="col-md-12">
                                    <div class="form-group form_field">
                                        <label>Full Name <span class="red">*</span></label>
                                        <input class="form-control" name="name" type="text" value="{{old('name',$data->name)}}"  />
                                    </div>                            
                                    <div class="form-group form_field">
                                        <label>User Type <span class="red">*</span></label>
                                        <select class="form-control" name="user_type_id" id="user_type">
                                            <?php $userType = staticDropdown("userType"); ?>
                                            @foreach($userType as $uk=>$uv)
                                            <option value="{{$uk}}" {{ (old('user_type_id',$data->user_type_id)==$uk)?'selected="selected"':'' }} >{{$uv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Email<span class="red">*</span></label>
                                        <input class="form-control" name="email" id="email" type="email" value="{{old('email',$data->email)}}" />
                                        <input name="email_confirmation" type="hidden" value="{{$data->email}}" />
                                    </div>

                                    <div class="form-group form_field">
                                        <label>Mobile No <span class="red">*</span> </label>
                                        <input class="form-control" name="mobile" id="mobile" type="tel" maxlength="15" value="{{old('mobile',$data->mobile)}}" />
                                    </div>
                                    <div class="form-group form_field {{ $errors->has('landline') ? ' has-error' : '' }}">
                                        <label>Landline</label>
                                        <input class="form-control" name="landline" id="landline" type="tel" maxlength="15" value="{{ old('landline', $data->landline) }}" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Upload Photo</label>
                                        <input type="file" class="form-control" name="up_photo" />
                                    </div>
                                    <div class="form-group form_field">
                                        <label>Upload Photo Id</label>
                                        <input type="file" class="form-control" name="up_photo_id" />
                                    </div>

                                </div>


                                <div class="clearfix"></div>
                                <div class="form-group col-sm-10">
                                    <div class="pull-right">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        &nbsp;
                                        <input type="button" id="cancelBtn" data-url="{{url('/users')}}" class="btn btn-white" name="cancel" value="Cancel" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @include('elements.error')
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
