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
                        <div class="table-responsive">

                            <table id="food_menu" class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>                                        
                                        <th>Day of Week</th>                                        
                                        <th>Breakfast</th>                                        
                                        <th>Lunch</th>                                        
                                        <th>Dinner</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0;$i<7;$i++)
                                    <tr>
                                        <td class="col-md-3">{{$days[$i]}}</td>                                        
                                        <td class="col-md-3">
                                            <select data-placeholder="Food Choices" multiple class="form-control chosen-select" name="food_name_breakfast[]" id="food_name_breakfast">
                                                <option value="">Select</option>                                            
                                            </select>                                            
                                        </td>
                                        <td class="col-md-3">
                                            <select data-placeholder="Food Choices" multiple class="form-control chosen-select" name="food_name_lunch[]" id="food_name_lunch">
                                                <option value="">Select</option>                                            
                                            </select>                                            
                                        </td>
                                        <td class="col-md-3">
                                            <select data-placeholder="Food Choices" multiple class="form-control chosen-select" name="food_name_dinner[]" id="food_name_dinner">
                                                <option value="">Select</option>                                            
                                            </select>                                            
                                        </td>                                        
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
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