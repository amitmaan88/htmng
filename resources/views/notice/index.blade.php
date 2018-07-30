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
                        <form role="form" method="get">                            
                            <div class="col-md-6">                                    
                                <div class="form-group">
                                    <label>Current Template <span class="red">*</span></label>
                                    <select class="form-control input-small" name="title_id" id="template">
                                        <option value="">Select</option>                                    
                                        @foreach($alldata as $key=>$val)
                                        <option {{old('template', $id)==$val->id || $val->current_template === 1?"selected=selected":""}} value="{{$val->id}}">{{$val->title}}</option>                                            
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6"></div>                                
                            <div class="col-md-12">                                    
                                <div class="form-group" id="notice_view">
                                    @if(!empty($data)) 
                                    @foreach($data as $kv=>$vk) 
                                    {!! $vk->template_html !!}
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection
