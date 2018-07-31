@extends('layouts.main')

@section('content')

<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6">
                <h2>{{$pageHeading}}</h2>
            </div>           
        </div>
        <?php $days = staticDropdown('foodDay'); ?>
        <!-- /. ROW  -->
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Responsive Table Example
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="{{route('food.menu')}}">
                                {{ csrf_field() }}
                                <div class="table-responsive">
                                    <table id="food_menu" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr>                                        
                                                <th class="col-xs-3">Day of Week</th>                                        
                                                <th class="col-xs-3">Breakfast</th>                                        
                                                <th class="col-xs-3">Lunch</th>                                        
                                                <th class="col-xs-3">Dinner</th>                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i=0;$i<7;$i++)
                                            <tr class="gradeA {{($i%2==0?'even':'odd')}}">
                                                <td class="col-xs-3">{{$days[$i]}}</td>                                        
                                                <td class="col-xs-3">
                                                    <select data-placeholder="Food Choices" multiple class="form-control chosen-select" name="food_name_breakfast[{{$i}}][]" id="food_name_breakfast">
                                                        @foreach($data as $key=>$value)
                                                        <option {{($value->day === 'break_fast')?"selected='selected'":""}} value="{{$value->id}}">{{$value->food_name}}</option>
                                                        @endforeach
                                                    </select>                                            
                                                </td>
                                                <td class="col-xs-3">
                                                    <select data-placeholder="Food Choices" multiple class="form-control chosen-select" name="food_name_lunch[{{$i}}][]" id="food_name_lunch">
                                                        @foreach($data as $key=>$value)
                                                        <option {{($value->day === 'lunch')?"selected='selected'":""}} value="{{$value->id}}">{{$value->food_name}}</option>
                                                        @endforeach                                            
                                                    </select>                                            
                                                </td>
                                                <td class="col-xs-3">
                                                    <select data-placeholder="Food Choices" multiple class="form-control chosen-select" name="food_name_dinner[{{$i}}][]" id="food_name_dinner">
                                                        @foreach($data as $key=>$value)
                                                        <option {{($value->day === 'dinner')?"selected='selected'":""}} value="{{$value->id}}">{{$value->food_name}}</option>
                                                        @endforeach
                                                    </select>                                            
                                                </td>                                        
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">                                        
                                        <input type="submit" class="btn btn-primary" value="Create" />
                                        <input type="button" id="cancelBtn" data-url="{{url('/food')}}" class="btn btn-default" name="cancel" value="Cancel" />
                                    </div>
                                </div>
                            </form>
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