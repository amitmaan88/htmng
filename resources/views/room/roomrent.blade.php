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
                                                <td width="332" colspan="3" valign="top">
                                                    <p>
                                                        <strong>TENANT</strong>
                                                        :
                                                    </p>
                                                    <p>{{$userDetail['address']}}</p>
                                                </td>
                                                <td width="340" colspan="6" valign="top">
                                                    <p>
                                                        <strong>LANDLORD</strong>
                                                        :
                                                    </p>
                                                    <p>{{$hotelDetail['hotel_address']}}</p>
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
                                                        $
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="526" colspan="7">
                                                    <p align="right">
                                                        <strong></strong>
                                                    </p>
                                                </td>
                                                <td width="146" colspan="2">
                                                    <p align="center">
                                                        Dollars<strong></strong>
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
                                                        690 Candlelight Drive
                                                    </p>
                                                    <p>
                                                        Katy, TX 77493
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
                                                </td>
                                                <td width="127" colspan="4">
                                                    <p align="center">
                                                        <strong>To</strong>
                                                    </p>
                                                </td>
                                                <td width="127">
                                                    <p align="center">
                                                        <strong></strong>
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
                                                        <strong>□ </strong>
                                                        Cash<strong></strong>
                                                    </p>
                                                </td>
                                                <td width="127" colspan="2">
                                                    <p align="center">
                                                        □ Credit Card
                                                    </p>
                                                </td>
                                                <td width="127" colspan="4">
                                                    <p align="center">
                                                        <strong>□ </strong>
                                                        Check<strong></strong>
                                                    </p>
                                                </td>
                                                <td width="127">
                                                    <p align="center">
                                                        <strong>□ </strong>
                                                        Money order<strong></strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="162">
                                                    <p align="right">
                                                        <strong>PAID BY</strong>
                                                    </p>
                                                </td>
                                                <td width="170" colspan="2">
                                                    <p align="center">
                                                        <strong></strong>
                                                    </p>
                                                </td>
                                                <td width="170" colspan="2">
                                                    <p align="center">
                                                        <strong>RECEIVED BY</strong>
                                                    </p>
                                                </td>
                                                <td width="170" colspan="4">
                                                    <p align="center">
                                                        <strong></strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="672" colspan="9">
                                                    <p align="center">
                                                        <em>THANK YOU FOR YOUR BUSINESS</em>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">                                        
                                            <input type="submit" class="btn btn-primary" value="Pay Rent" />
                                            <input type="button" id="cancelBtn" data-url="{{url('/home')}}" class="btn btn-default" name="cancel" value="Cancel" />
                                        </div>
                                    </div>
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



