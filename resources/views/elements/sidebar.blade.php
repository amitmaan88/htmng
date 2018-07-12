<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="img/find_user.png" class="user-image img-responsive"/>
            </li>
            <li>
                <a href="/home"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop fa-3x"></i> User Management<span class="fa arrow"></span></a>                
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/users')}}">User List</a>
                    </li>                                        
                    <li>
                        <a href="{{url('/users/upload')}}">Bulk Upload</a>
                    </li>                                        
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-qrcode fa-3x"></i>Room Management<span class="fa arrow"></span></a>                
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/room')}}">Room List</a>
                    </li>                                        
                    <li>
                        <a href="{{url('/room/roomtype')}}">Room Type</a>
                    </li>                                        
                </ul>
            </li>
            <li>
                <a href="{{url('/notice')}}"><i class="fa fa-bar-chart-o fa-3x"></i> Notice</a>
            </li>
            <li>
                <a  href="{{url('/complaint')}}"><i class="fa fa-table fa-3x"></i> Complaints</a>
            </li>
            <li>
                <a  href="{{url('/report')}}"><i class="fa fa-table fa-3x"></i> Report</a>
            </li>
            <li>
                <a  href="#"><i class="fa fa-edit fa-3x"></i> Food Menu<span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{url('/fooditems')}}">Type</a>
                    </li>
                    <li>
                        <a href="{{url('/food')}}">Add Food</a>
                    </li>                    
                </ul>
            </li>            
        </ul>
    </div>
</nav>
