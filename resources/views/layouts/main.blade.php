<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    @include('elements.head')
    <body>
        <div id="wrapper">
            @include('elements.header')

            @if(auth()->check())
            <!-- /. NAV TOP  -->
            @include('elements.sidebar')
            @endif
            <!-- /. NAV SIDE  -->
            @yield('content')

            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        @include('elements.footer')
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    </body>
</html>
