var htmng = {
    currClass: '',
    baseUrl:'',
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
            var args = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'status': $(this).attr('data-var'),
                'id': $(this).attr('data-id')
            };
            $.ajax({
                url: this.baseUrl+'/changeSatus',
                type: "POST",
                data: args,
                async: false,
                success: function(rsp) {
                    if(rsp.code==200) {
                        result = rsp.data;
                    }
                    if(rsp.code==100) {
                        alert(rsp.data);
                    }
                }
            });
        });
    }
};
