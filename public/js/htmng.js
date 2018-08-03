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
        window.location.href = url;
    },
    paginationInit: function () {
        $('.pagination li').addClass('paginate_button').attr('aria-controls', "dataTables-example");
        $('.pagination li:first-child').addClass('previous');
        $('.pagination li:first-child span, .pagination li:first-child a').text('Previous');
        $('.pagination li:last-child').addClass('next');
        $('.pagination li:last-child span, .pagination li:last-child a').text('Next');
    },
    btnDelete: function (btnId) {
        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'status': 2,
            'id': btnId.attr('data-id')
        };
        $.ajax({
            url: this.baseUrl + '/changeStatus',
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
    btnActiveInactive: function (btnId, url) {

        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'status': btnId.attr('data-var'),
            'id': btnId.attr('data-id')
        };
        $.ajax({
            url: this.baseUrl + url + '/cstatus',
            type: "POST",
            data: args,
            async: false,
            success: function (data) {
                if (btnId.attr('data-var') == 0) {
                    btnId.text("Inactive");
                    btnId.attr('data-var', 1);
                    btnId.addClass("btn-default");                    
                    btnId.removeClass("btn-success");                    
                } else {
                    btnId.text("Active");
                    btnId.attr('data-var', 0);
                    btnId.addClass("btn-success");                    
                    btnId.removeClass("btn-default");                    
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }

        });
    },
    templateLoad: function (selectId) {
        if (selectId.val() === "") {
            window.location.href = this.baseUrl + '/notice/template';
        } else {
            $("#title_id").val(selectId.val());
            document.forms[0].action = "";
            document.forms[0].submit();
        }
    }
};
