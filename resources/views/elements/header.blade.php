<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Administrator</a>
    </div>
    <div style="padding: 15px 50px 5px 50px;
         float: right;
         font-size: 16px;">
        @if(auth()->check())
        <span style="color: white;">Logged in as :</span> <a href="javascript:void(0);" title="View Profile" data-toggle="modal" data-target="#myModal">{{ auth()->user()->name  }}</a> &nbsp;<a href="{{url('/logout')}}" class="btn btn-danger square-btn-adjust"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
        <div class="row">
            <div class="col-md-6">
                <!--  Modals-->                        
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Profile</h4>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="profile" class="table borderless no-footer" aria-describedby="dataTables-example_info">
                                        <thead>
                                            <tr>                                        
                                                <th class="col-xs-3">Full Name</th>                                        
                                                <td class="col-xs-3">{{auth()->user()->name}}</td>                                        
                                                <th class="col-xs-3">Email</th>                                        
                                                <td class="col-xs-3">{{auth()->user()->email}}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-xs-3">Mobile</th>                                        
                                                <td class="col-xs-3">{{auth()->user()->mobile}}</td>                                        
                                                <th class="col-xs-3">Address</th>                                        
                                                <td class="col-xs-3">{{auth()->user()->address}}</td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modals-->
                </div>
            </div>
            @else
            &nbsp;
            @endif
        </div>
</nav>