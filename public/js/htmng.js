var htmng = {
    currClass: '',
    activeClass: '',
    baseUrl: '',
    activeInactive: function () {
        if (this.currClass !== '') {
            var href = window.location.href;
            //console.log(href);
            var hrefSplit = href.replace("http://", "");
            hrefSplit = hrefSplit.replace("https://", "");
            hrefSplit = hrefSplit.split("/");
            //console.log(hrefSplit);
            if (hrefSplit.length >= 4 && hrefSplit[hrefSplit.length - 1] !== "") {
                var searchUrl = hrefSplit[hrefSplit.length - 1];
                if ($('#main-menu li a[href*=' + searchUrl + ']').length > 0) {
                    $('#main-menu li a[href*=' + searchUrl + ']').addClass(this.currClass);
                    $('#main-menu li a[href*=' + searchUrl + ']').parent('li').addClass(this.activeClass);
                } else {
                    searchUrl = hrefSplit[hrefSplit.length - 2];
                    $('#main-menu li a[href*=' + searchUrl + ']').addClass(this.currClass);
                    $('#main-menu li a[href*=' + searchUrl + ']').parent('li').addClass(this.activeClass);
                }
            }
        }
    },
    btnActiveInactive: function (btnId) {

        if (btnId.text() === "Active") {
            btnId.text("Inactive");
            btnId.attr('data-var', 1)
        } else {
            btnId.text("Active");
            btnId.attr('data-var', 0)
        }
        var args = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'status': btnId.attr('data-var'),
            'id': btnId.attr('data-id')
        };
        $.ajax({
            url: this.baseUrl + '/changeSatus',
            type: "POST",
            data: args,
            async: false,
            success: function (rsp) {
                if (rsp.code == 200) {
                    result = rsp.data;
                }
                if (rsp.code == 100) {
                    alert(rsp.data);
                }
            }
        });
    },
};
