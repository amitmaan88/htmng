@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6">
                <h2>{{$pageHeading}}</h2>
            </div>
            <div class="col-md-6">
                <div class="btn-toolbar">
                    <a href="{{url('notice')}}" type="reset" class="btn btn-default pull-right">Refresh</a>
                    <a href="{{url('notice/template')}}" class="btn btn-primary pull-right">Create Template</a>                    
                </div>
            </div>
        </div>

        <!-- /. ROW  -->
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table Example
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">                                    
                            <div class="form-group form_field">
                                <label>Current Template <span class="red">*</span></label>
                                <select class="form-control" name="template" id="template">
                                    <option value="">Select</option>                                            
                                </select>
                            </div>
                            <div class="form-group" id="notice_view">

                            </div>
                        </div>                        
                    </div>
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection
