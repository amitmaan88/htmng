var htmng = {
    currClass: '',
    activeClass: '',
    baseUrl: '',
    activeInactive: function () {
        if (this.currClass !== '') {
            var hreff = window.location.href;
            //console.log(href);
            var href = hreff.substring(0, hreff.indexOf('?'));
            if (href === "") {
                href = hreff;
            }
            //console.log(href);
            var searchUrl = "";
            var hrefSplit = href.replace("http://", "");
            hrefSplit = hrefSplit.replace("https://", "");
            hrefSplit = hrefSplit.split("/");
            //console.log(hrefSplit);                        
            if (hrefSplit.length >= 4 && hrefSplit[hrefSplit.length - 1] !== "") {
                searchUrl = hrefSplit[hrefSplit.length - 1];
                if ($('a[href*=' + searchUrl + ']').length > 0) {
                    $('a[href$=' + searchUrl + ']').addClass(this.currClass);
                    $('a[href*=' + searchUrl + ']').closest('li.parent').addClass(this.activeClass);
                } else {
                    searchUrl = hrefSplit[hrefSplit.length - 2];
                    $('a[href$=' + searchUrl + ']').addClass(this.currClass);
                    $('a[href*=' + searchUrl + ']').closest('li.parent').addClass(this.activeClass);
                }
            } else {
                if (hrefSplit[hrefSplit.length - 1] === "") {
                    searchUrl = "home";
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
    btnDelete: function (btnId, url) {
        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'status': 2,
            'id': btnId.attr('data-id'),
            'tab_stat': 0
        };
        $.ajax({
            url: this.baseUrl + url + '/cstatus',
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
    btnActiveInactive: function (btnId, url) {

        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'status': btnId.attr('data-var'),
            'id': btnId.attr('data-id'),
            'tab_stat': (typeof btnId.attr('tab_stat') == "undefined") ? 0 : btnId.attr('tab_stat'),
        };
        $.ajax({
            url: this.baseUrl + url + '/cstatus',
            type: "POST",
            data: args,
            async: false,
            success: function (data) {
                if (btnId.attr('data-var') == 1) {
                    btnId.text("Inactive");
                    btnId.attr('data-var', 0);
                    btnId.addClass("btn-default");
                    btnId.removeClass("btn-success");
                } else {
                    btnId.text("Active");
                    btnId.attr('data-var', 1);
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
    },
    complaintStatus: function (selId) {

        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'status': selId.val(),
            'id': selId.attr('data-id'),
        };
        var url = "/complaint";
        $.ajax({
            url: this.baseUrl + url + '/cstatus',
            type: "POST",
            data: args,
            async: false,
            success: function (data) {

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
    loadRoomTypeDetails: function (obj) {
        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'id': obj.val(),            
        };
        var url = "/room";
        $.ajax({
            url: this.baseUrl + url + '/rmtype',
            type: "POST",
            data: args,
            async: false,
            success: function (dat) {
                var data = dat.response;                
                $("#bed_no").val(data.bed_no);
                $("#daily_cost").val(data.daily_cost);
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
    userAssignRoom: function (obj) {
        var args = {
            '_token': $('meta[name="token"]').attr('content'),
            'user_id': obj.val(),            
            'room_id': obj.attr('data-rm-id'),
        };
        var url = "/room";
        $.ajax({
            url: this.baseUrl + url + '/assignusrroom',
            type: "POST",
            data: args,
            async: false,
            success: function (dat) {
                var data = dat.response;                
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
};
