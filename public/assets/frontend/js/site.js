$(document).ready(function ($) {
    STATICS.navigationIcon();
    STATICS.carousel();
    STATICS.btnTop();
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
    },

    btnTop:function () {
        if ($('.btnTop').length > 0){
            $(window).scroll(function () {
                var e = $(window).scrollTop();
                if (e > 500){
                    $('.btnTop').fadeIn(500);
                }
                else {
                    $('.btnTop').fadeOut(500);
                }
            });

            $('.btnTop').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                },700)
            })
        }
    },

};