@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>{{$pageHeading}}</h2>
                @include('elements.message')                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Food Items
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="{{route('food.store')}}">
                                {{ csrf_field() }}
                                <div class="col-md-9">
                                    <div class="form-group form_field">
                                        <label>Items <span class="red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa"></i> 
                                            </div>
                                            <input class="form-control" name="food_name" id="food_name" type="text" />
                                        </div>
                                    </div>                                                                                                            
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Create" />
                                        <input type="button" id="cancelBtn" data-url="{{url('/food/item')}}" class="btn btn-default" name="cancel" value="Cancel" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('elements.error')
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                <thead>
                                    <tr>                                        
                                        <th class="col-xs-2">Sr</th>
                                        <th class="col-xs-5">Item</th>                                                                                
                                        <th class="col-xs-5">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $Status = array_reverse(staticDropdown("status")); ?>
                                    @foreach($data as $k=>$val)
                                    <tr class="gradeA {{($k%2==0?'even':'odd')}}">                                        
                                        <td class="col-xs-2">{{++$k}}.</td>
                                        <td class="col-xs-5">{{$val->food_name}}</td>                                        
                                        <td class="col-xs-5">
                                            <a href="{{url('/food/'.$val->id.'/item')}}"><button type="button" class="btn btn-primary"><i class="fa fa-btn fa-edit"></i> Edit</button></a>
                                            <button type="button" class="btn btn-danger deleteBtn" data-id="{{$val->id}}"><i class="fa fa-btn fa-trash-o"></i> Delete</button>
                                            <button data-url="{{'/food'}}" type="button" class="btn {{($val->status == 1)?'btn-default':'btn-success'}} actinc" data-var="{{($val->status == 1)?0:1}}" data-id="{{$val->id}}">{{$Status[$val->status]}}</button>                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6"><div role="alert" aria-live="polite" aria-relevant="all">Total Records: {{$data->total()}}</div></div>
                                <div class="col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">{{ $data->appends(Request::except('page'))->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection
