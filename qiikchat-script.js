function qiikchatpopup(url, title, w, h) {
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    return window.open(url, title, 'height=141, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left)
}

jQuery('#qiikchat-a').click(function (event) {
    event.preventDefault();
    currentqiikpage = encodeURI(window.location.href);
    qiikchatpopup('https://qiikchat.com/sendtodevice/?linkurl=' + currentqiikpage, 'QiikChat Share', 640, 268);
})

jQuery(window).scroll(function () {
    if ((jQuery(this).scrollTop()) < 600) {
        jQuery('#qiikchat-container').fadeIn();
    } else {
        if ((jQuery(window).scrollTop() + jQuery(window).height()) > (jQuery(document).height() - 600)) {
            jQuery('#qiikchat-container').fadeIn();
        } else {
            jQuery('#qiikchat-container').fadeOut();
        }
    }
});
