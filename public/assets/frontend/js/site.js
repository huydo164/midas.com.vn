$(document).ready(function ($) {
    STATICS.navigationIcon();
    STATICS.slickSlider();
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

    slickSlider:function () {
        $(".slider-area").slick({
            lazyLoad: 'ondemand', // ondemand progressive anticipated
            infinite: true,
            autoplay: true,
            appendArrows: false,
            appendDots: false
        });
    }
};