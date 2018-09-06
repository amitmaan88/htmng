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
                        Rent Receipt
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="get" action="{{route('room.rent')}}">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                    <div class="col-md-6">RENT RECEIPT</div>
                                </div>                                
                            </form>
                        </div>
                        @include('elements.error')
                    </div>                  
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- /. PAGE INNER  -->
</div>
@endsection



