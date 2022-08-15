$('.header__hamburger').on('click', function() {
    if ($(this).hasClass('open')) {
        $(this).removeClass('open');
        $('.menu-mainmenu-container').removeClass('open')
    } else {
        $(this).addClass('open');
        $('.menu-mainmenu-container').addClass('open');
    }
});