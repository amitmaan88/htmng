var htmng = {
    currClass: '',
    activeInactive: function () {
        if (this.currClass !== '') {
            var href = window.location.href;
            var hrefSplit = href.split("/");
            var searchUrl = hrefSplit[hrefSplit.length - 1];
            if ($('#main-menu li a[href*=' + searchUrl + ']').length > 0) {
                $('#main-menu li a[href*=' + searchUrl + ']').addClass(this.currClass);
            } else {
                searchUrl = hrefSplit[hrefSplit.length - 2];
                $('#main-menu li a[href*=' + searchUrl + ']').addClass(this.currClass);
            }
        }
    },
    btnActiveInactive: function () {
        $("#actinc").on('click', function () {
            if ($(this).val() === "Active") {
                $(this).val("Inactive");
            } else {
                $(this).val("Active");
            }
            $.ajax({
                url: '',
            });
        });
    }
};