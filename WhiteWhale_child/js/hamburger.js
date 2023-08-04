jQuery('.header__hamburger').on('click', function() {
    if (jQuery(this).hasClass('open')) {
        jQuery(this).removeClass('open');
        jQuery('.menu-mainmenu-container').removeClass('open')
    } else {
        jQuery(this).addClass('open');
        jQuery('.menu-mainmenu-container').addClass('open');
    }
});