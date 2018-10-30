@yield('ckeditorscript')
<!-- JQUERY SCRIPTS -->
<script src="{{url('js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{url('js/jquery.metisMenu.js')}}"></script>
<script src="{{url('js/htmng.js')}}"></script>
<script src="{{url('js/chosen.jquery.min.js')}}"></script>
<!-- MORRIS CHART SCRIPTS -->
<!--<script src="{{url('js/morris/raphael-2.1.0.min.js')}}"></script>-->
<!--<script src="{{url('js/morris/morris.js')}}"></script>-->
<!-- CUSTOM SCRIPTS -->
<!--<script src="{{url('js/custom.js')}}"></script>-->
<script>
htmng.currClass = "active-menu";
htmng.activeClass = "active";
htmng.baseUrl = "{{url('/')}}";
htmng.activeInactive();
htmng.paginationInit();

$(document).ready(function () {
    // ==================================== METIS MENU ================================================
    $('#main-menu').metisMenu();

    // ==================================== LOAD APPROPRIATE MENU BAR ==================================
    $(window).bind("load resize", function () {
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse');
        } else {
            $('div.sidebar-collapse').removeClass('collapse');
        }
    });
    // ==================================== CONTROL ACTIVE BUTTON ======================================
    $(".actinc").on('click', function () {
        htmng.btnActiveInactive($(this), $(this).attr('data-url'));
    });
    // ==================================== CONTROL TEMPLATE LOAD ======================================
    $("#template").on('change', function () {
        htmng.templateLoad($(this));
    });
    // ==================================== CANCEL BUTTON ==============================================
    $("#cancelBtn").on('click', function () {
        htmng.btnCancel($(this));
        return false;
    });
    // ==================================== DELETE BUTTON ==============================================
    $(".deleteBtn").on('click', function () {
        htmng.btnDelete($(this), $(".actinc").attr('data-url'));
        var href = window.location.href;
        window.location.href = href;
    });
    // ==================================== LOAD HOTELS ==============================================
    $("#hotel_name").on('change', function () {
        var forms = document.forms[0];
        forms.submit();
    });
    // ==================================== CHANGE COMPLAINT STATUS ==============================================
    $(".comp_status").on('change', function () {
        htmng.complaintStatus($(this));
    });
    // ==================================== INITIALIZE CHOSEN DROPDOWN ==================================
    $("#food_menu select.chosen-select").chosen();
    $(".chosen-search-input").on('change', function () {
        $("#food_menu select.chosen-select").val('').trigger("liszt:updated");
    });
    $("#room_type").change(function(){
        htmng.loadRoomTypeDetails($(this));
    });
    $(".user").change(function(){
        htmng.userAssignRoom($(this));
    });

});
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>

