(function ($) {
    const $header = $('.header'),
        $navbar = $('.navbar'),
        $window = $(window),
        navbarOffsetTop = $navbar.offset().top;

    $window.on('scroll', function () {
        const windowOffsetTop = $window.scrollTop();
        if (windowOffsetTop > navbarOffsetTop) {
            $header.addClass('sticky');
        } else {
            $header.removeClass('sticky');
        }
    })

})(jQuery);