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
                            <form role="form" method="post" action="{{route('notice.store')}}">
                                {{ csrf_field() }}                                
                                <div class="col-md-6">                                    
                                    <div class="form-group form_field">
                                        <label>Template <span class="red">*</span></label>
                                        <select class="form-control" name="template" id="template">
                                            <option value="">New Template</option>                                             
                                            @foreach($alldata as $key=>$val)
                                            <option {{old('template', $id)==$val->id?"selected=selected":""}} value="{{$val->id}}">{{$val->title}}</option>                                            
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">                                    
                                    <div class="form-group form_field">
                                        <label>Template Title<span class="red">*</span></label>
                                        @if(!empty($id)) 
                                        @foreach($data as $kv=>$vk)
                                        <input value="{{old('title',$vk->title)}}" type="text" class="form-control" name="title" id="title" />
                                        @endforeach
                                        @else
                                        <input value="{{old('title')}}" type="text" class="form-control" name="title" id="title" />
                                        @endif
                                        <input value="{{old('title_id', $id)}}" type="hidden" name="title_id" id="title_id" />
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        @if(!empty($id)) 
                                        @foreach($data as $kv=>$vk)                                        
                                        <textarea data-val="" name="template_html" id="editor1">{{$vk->template_html}}</textarea>
                                        @endforeach
                                        @else
                                        <textarea name="template_html" id="editor1"></textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="{{$btnText}}" />
                                        <button id="cancelBtn" data-url="{{url('/notice')}}" class="btn btn-white" name="cancel" value="1">Cancel</button>
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

@section('ckeditorscript')
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>var editor = CKEDITOR.replace('editor1');</script>
@stop

