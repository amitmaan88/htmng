@extends('layouts.main')

@section('content')
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6">
                <h2>{{$pageHeading}}</h2>
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
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th title="Select All">#
                                            <label class="checkbox-inline">
                                                <input type="checkbox"/>
                                            </label>
                                        </th>                                        
                                    </tr>
                                </thead>
                                <tbody>                                   
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
