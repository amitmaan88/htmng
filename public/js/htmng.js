var htmng = {
    currClass: '',
    activeClass: '',
    baseUrl: '',
    activeInactive: function () {
        if (this.currClass !== '') {
            var href = window.location.href;
            href = href.substring(0, href.indexOf('?'));
            //console.log(href);
            var hrefSplit = href.replace("http://", "");
            hrefSplit = hrefSplit.replace("https://", "");
            hrefSplit = hrefSplit.split("/");
            //console.log(hrefSplit);
            if (hrefSplit.length >= 4 && hrefSplit[hrefSplit.length - 1] !== "") {
                var searchUrl = hrefSplit[hrefSplit.length - 1];
                if ($('a[href*=' + searchUrl + ']').length > 0) {
                    $('a[href$=' + searchUrl + ']').addClass(this.currClass);
                    $('a[href*=' + searchUrl + ']').closest('li.parent').addClass(this.activeClass);
                } else {
                    searchUrl = hrefSplit[hrefSplit.length - 2];
                    $('a[href$=' + searchUrl + ']').addClass(this.currClass);
                    $('a[href*=' + searchUrl + ']').closest('li.parent').addClass(this.activeClass);
                }
            }
        }
    },
    btnCancel: function (btnThis) {
        var url = btnThis.attr('data-url');
        //console.log(url);return false;
        window.location.href = url;
    },
    paginationInit: function () {
        $('ul.pagination').addClass('justify-content-center');
        $('.pagination li').addClass('page-item');
        $('.pagination li a').addClass('page-link');
        $('.pagination span').addClass('page-link');
        $('.pagination li:first-child span, .pagination li:first-child a').text('Previous');
        $('.pagination li:last-child span, .pagination li:last-child a').text('Next');
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
