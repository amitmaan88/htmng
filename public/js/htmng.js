var htmng = {
    currClass: '',
    activeInactive: function() {
        if(this.currClass !== '') {
            var href = window.location.href;
            var hrefSplit = href.split("/");            
            $('#main-menu li a[href*="/'+ hrefSplit[3] +'/"]').addClass(this.currClass);            
        }
    }
};