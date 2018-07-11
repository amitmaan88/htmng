@extends('layouts.main')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight user-management">
    <div class="row">
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="{{ route('branches.update', $data->id) }}">
        {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="col-lg-12">
                <div class="ibox-title">
                    <h5>Please Update below fields</h5>
                </div>
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="form-group col-sm-6{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Branch Name <span class="red">*</span></label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" name="name" placeholder="Enter Branch Name" class="form-control" value="{{ old('name', $data->name) }}"><!--autofocus="autofocus"-->
                            </div>
                        </div>
                        <div class="form-group col-sm-6{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Email <span class="red">*</span></label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" name="email" placeholder="Enter Email Id" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email', $data->email) }}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Mobile <span class="red">*</span></label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" name="mobile" placeholder="Enter Mobile Number" class="form-control" value="{{ old('mobile', $data->mobile) }}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6{{ $errors->has('advance_amount') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Advance Amount</label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" name="advance_amount" placeholder="Enter Advance Amount" class="form-control" value="{{ old('advance_amount', $data->advance_amount) }}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6{{ $errors->has('amount_type') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Amount Type</label>
                            <div class="col-sm-8">
                                <select name="amount_type" class="form-control">
                                    <option value="Fixed" {{ (old('amount_type', $data->amount_type)=='Fixed')?"selected='selected'":''}}>Fixed</option>
                                    <option value="Variable" {{ (old('amount_type', $data->amount_type)=='Variable')?"selected='selected'":''}}>Variable</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-sm-6{{ $errors->has('no_installment') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">No. of Milestone</label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" name="no_installment" placeholder="Enter Number of Milestore" class="form-control" value="{{ old('no_installment', $data->no_installment) }}">
                            </div>
                        </div>

                        <div class="form-group col-sm-6{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label class="col-sm-4 control-label">Amount <span class="red">*</span></label>
                            <div class="col-sm-8">
                                <input autocomplete="off" type="text" name="amount" placeholder="Enter Amount" class="form-control" value="{{ old('amount', $data->amount) }}">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-sm-10">
                            <div class="pull-right">
                                <button class="btn btn-primary" type="submit">Update</button>
                                &nbsp;
                                <button class="btn btn-white" name="cancel" value="1">Cancel</button>
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
@endsection
