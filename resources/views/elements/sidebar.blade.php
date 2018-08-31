<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">                
                @php $file = $_SERVER['DOCUMENT_ROOT']."/htmng/public/image/user/".auth()->user()->id."/profile_image.jpg";@endphp             
                @if(auth()->user()->user_type_id !== 0 && file_exists($file) === true)
                <img src="{{"image/user/".auth()->user()->id."/profile_image.jpg"}}" class="user-image img-responsive"/>
                @else
                <img src="img/find_user.png" class="user-image img-responsive"/>
                @endif
            </li>            
            <li>
                <a href="{{url('/home')}}"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
            </li>
            @if(auth()->user()->user_type_id === 0 || auth()->user()->user_type_id === 1)
            <li class="parent">
                <a href="#"><i class="fa fa-users fa-2x"></i> User Management<span class="fa arrow"></span></a>                
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/users')}}">User List</a>
                    </li>                                                                                                    
                </ul>
            </li>
            <li class="parent">
                <a href="#"><i class="fa fa-home fa-2x"></i>Room Management<span class="fa arrow"></span></a>                
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/room')}}">Room List</a>
                    </li>                                        
                    <li>
                        <a href="{{url('/room/roomtype')}}">Room Type</a>
                    </li>                                        
                </ul>
            </li>
            @endif            
            <li>
                <a href="{{url('/notice')}}"><i class="fa fa-briefcase fa-2x"></i> Notice</a>
            </li>
            <li>
                <a href="{{url('/complaint')}}"><i class="fa fa-signal fa-2x"></i> Complaints</a>
            </li>            
            <li class="parent">
                <a  href="#"><i class="fa fa-cutlery fa-2x"></i> Food Management<span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level collapse">
                    @if(auth()->user()->user_type_id === 0 || auth()->user()->user_type_id === 1)
                    <li>
                        <a href="{{url('/food/item')}}">Food Items</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('/food')}}">Food Menu</a>
                    </li>                    
                </ul>
            </li>            
        </ul>
    </div>
</nav>
