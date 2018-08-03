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
    <div style="color: white;
         padding: 15px 50px 5px 50px;
         float: right;
         font-size: 16px;"> 

        @if(auth()->check())
        Logged in as : {{ auth()->user()->name  }} &nbsp;<a href="{{url('/logout')}}" class="btn btn-danger square-btn-adjust"><i class="fa fa-btn fa-sign-out"></i>Logout</a> 
        @else
        &nbsp;
        @endif


    </div>
</nav>
