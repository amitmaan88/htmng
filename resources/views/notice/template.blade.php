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
                        Templates
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" enctype="multipart/form-data" action="{{route('notice.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">                                    
                                    <div class="form-group form_field">
                                        <label>Template <span class="red">*</span></label>
                                        <select class="form-control" name="template" id="template">
                                            <option value="">New Template</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">                                        
                                        <textarea name="editor1" id="editor1">  </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" name="addtemplate" id="addtemplate" value="Create" />
                                        <button id="cancelBtn" data-url="{{url('/notice/template')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
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
