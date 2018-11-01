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
                        <form class="form-inline" role="form" method="post" action="{{route('room.rent')}}">
                            <div class="table-responsive">
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <table id="room_type_list" class="table table-striped table-bordered table-hover dataTable no-footer" aria-describedby="dataTables-example_info">                                
                                        <tbody>
                                            <tr>
                                                <td width="523" colspan="6">
                                                    <p>
                                                        <strong>Rent Receipt</strong>
                                                        <strong></strong>
                                                    </p>
                                                </td>
                                                <td width="149" colspan="3">
                                                    <p>
                                                        <strong>No.</strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="162">
                                                    <p align="right">
                                                        <strong>TENANT</strong>                                                        
                                                    </p>
                                                    <p>{{$userDetail['address']}}</p>
                                                </td>                                                
                                            </tr>
                                            <tr>
                                                <td width="162">
                                                    <p align="right">
                                                        <strong>AMOUNT</strong>
                                                    </p>
                                                </td>
                                                <td width="510" colspan="8">
                                                    <p>
                                                        &#8377;
                                                    </p>
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td width="162">
                                                    <p align="right">
                                                        <strong>PROPERTY</strong>
                                                    </p>
                                                </td>
                                                <td width="510" colspan="8">
                                                    <p>
                                                        {{$hotelDetail['hotel_address']}}
                                                    </p>                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="162">
                                                    <p align="right">
                                                        <strong>RENTAL PERIOD</strong>
                                                    </p>
                                                </td>
                                                <td width="127">
                                                    <p align="center">
                                                        <strong>From</strong>
                                                    </p>
                                                </td>
                                                <td width="127" colspan="2">
                                                    <p align="center">
                                                        <strong>{{date('M-Y', strtotime(RENT_START_MONTH))}}</strong>
                                                    </p>
                                                </td>
                                                <td width="127" colspan="4">
                                                    <p align="center">
                                                        <strong>To</strong>
                                                    </p>
                                                </td>
                                                <td width="127">
                                                    <p align="center">
                                                        <strong>{{date('M-Y', strtotime(RENT_START_MONTH .'+'.RENT_DURATION .'months'))}}</strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="162">
                                                    <p align="right">
                                                        <strong>PAYMENT BY</strong>
                                                    </p>
                                                </td>
                                                <td width="127">
                                                    <p align="center">
                                                        <strong><input class="form-control" name="payrent" id="payrentCash" type="radio" value="1" /> </strong>
                                                        Cash<strong></strong>
                                                    </p>
                                                </td>
                                                <td width="127" colspan="2">
                                                    <p align="center">
                                                        <strong><input class="form-control" name="payrent" id="payrentCard" type="radio" value="2" /> </strong>
                                                        Credit/Debit Card<strong></strong>
                                                    </p>
                                                </td>
                                                <td width="127" colspan="4">
                                                    <p align="center">
                                                        <strong><input class="form-control" name="payrent" id="payrentCheque" type="radio" value="3" /> </strong>
                                                        Cheque<strong></strong>
                                                    </p>
                                                </td>                                                
                                                <td width="127" colspan="4">
                                                    <p align="center">
                                                        <strong><input class="form-control" name="payrent" id="payrentOnline" type="radio" value="4" /> </strong>
                                                        Net Banking<strong></strong>
                                                    </p>
                                                </td>                                                
                                            </tr>                                                                                        
                                        </tbody>
                                    </table>
                                </div>
                                @if(auth()->user()->user_type_id === 2)  
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">                                        
                                            <input type="submit" class="btn btn-primary" value="Pay Rent" />
                                            <input type="button" id="cancelBtn" data-url="{{url('/home')}}" class="btn btn-default" name="cancel" value="Cancel" />
                                        </div>
                                    </div>
                                </div>
                                @endif
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



