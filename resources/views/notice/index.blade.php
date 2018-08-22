@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row m-t10">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                @include('elements.message')                
                @if(auth()->user()->user_type_id !== 2)
                <div class="btn-toolbar pull-right">
                    <a href="{{url('notice/template')}}" class="btn btn-primary"> Create Notice</a>
                    <a href="{{url('/notice')}}"><button type="button" class="btn btn-default"><i class="fa fa-btn fa-refresh"></i> Refresh </button></a>
                </div>
                @endif
            </div>
        </div>

        <!-- /. ROW  -->
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                        
                        Notice                        
                    </div>
                    <div class="panel-body">
                        <form role="form" method="get">                            
                            @if(auth()->user()->user_type_id !== 2)
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
                            @endif
                            <div class="col-md-6"></div>                                
                            <div class="col-md-12">                                    
                                <div class="form-group" id="notice_view">
                                    @if(!empty($data)) 
                                    @foreach($data as $kv=>$vk) 
                                    {!! $vk->template_html !!}
                                    @php $notice_id = $vk->id;@endphp                                    
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </form>                        
                    </div>                    
                    <div class="panel-footer"></div>                    
                </div>
            </div>
        </div>
        @if(auth()->user()->user_type_id === 2)
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="post" action="{{route('notice.serve')}}">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="form-group form_field">                                
                            <div class="col-xs-6">
                                <input readonly="readonly" type="text" class="form-control" value="{{auth()->user()->name}}" placeholder="Full Name" />
                                <input type="hidden" name="notice_id" id="notice_id" value="{{$notice_id}}" />
                            </div>
                            <div class="col-xs-6">
                                @if(count($noticeServeData) > 0)    
                                <input readonly="readonly" type="datetime" class="form-control" value="{{date('d/M/y H:i:s', strtotime($noticeServeData[0]['notice_date']))}}" placeholder="Date" />
                                @else
                                <input readonly="readonly" type="datetime" class="form-control" value="{{date('d/M/y H:i:s', strtotime('NOW'))}}" placeholder="Date" />
                                @endif
                            </div>                            
                        </div>                    

                        <div class="form-group">                                
                            @if(count($noticeServeData) <= 0)
                            <input type="submit" class="btn btn-primary" value="Submit" />                                
                            <input type="button" id="cancelBtn" data-url="{{url('/notice')}}" class="btn btn-white" name="cancel" value="Cancel" />
                            @else                             
                            <?php
                            $date = new DateTime($noticeServeData[0]['notice_date']);
                            $date->modify("+" . NOTICE_DAYS . " day");
                            $now = new DateTime();
                            ?>
                            <div class="col-xs-6 alert alert-warning" role="alert">                                
                                <span class="text-info">{{ $date->diff($now)->format("%d day(s), %h hour(s) and %i minute(s) are left in your notice.") }}</span>
                            </div>                            
                            @endif

                        </div>

                    </div>
                </form>
            </div>
        </div>
        @endif
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection
