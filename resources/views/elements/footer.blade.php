<!-- JQUERY SCRIPTS -->
<script src="{{url('js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{url('js/jquery.metisMenu.js')}}"></script>
<script src="{{url('js/htmng.js')}}"></script>
<script>
    htmng.currClass = "active-menu";
    htmng.baseUrl = "{{url('/')}}";
    htmng.activeInactive();

    $(document).ready(function(){
        htmng.btnActiveInactive();
    })
</script>

