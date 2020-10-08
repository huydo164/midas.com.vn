$(document).ready(function ($) {
    STATICS.navigationIcon();
    STATICS.carousel();
});

STATICS = {
    navigationIcon:function () {
        $('.navigationIcon, .backdropNav').click(function () {
            var backdrop = $('.backdropNav');
            var navigation = $('.navigation');
            $('.logo-web').toggleClass('open-logo');
            $('.navigation').toggleClass('nav-open');
            if (!(navigation).hasClass('nav-open')){
                backdrop.hide();
            }
            else{
                backdrop.show();
            }
        })
    },

    carousel:function () {
        $('.owl-carousel').owlCarousel({
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide'> </div>", "<div class='nav-btn next-slide'> </div>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    }
};