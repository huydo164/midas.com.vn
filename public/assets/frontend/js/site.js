$(document).ready(function($) {
    STATICS.navigationIcon();

    STATICS.searchSize();
    STATICS.searchColor();
    STATICS.minusButton();
    STATICS.plusButton();

    STATICS.btnTop();
    STATICS.menuList();
    STATICS.ratingSubmit();

});

STATICS = {

    navigationIcon: function() {
        $('.navigationIcon, .backdropNav').click(function() {
            var backdrop = $('.backdropNav');
            var navigation = $('.navigation');
            $('.logo-web').toggleClass('open-logo');
            $('.navigation').toggleClass('nav-open');
            if (!(navigation).hasClass('nav-open')) {
                backdrop.hide();
            } else {
                backdrop.show();
            }
        })
    },

    navigationIcon:function () {
        $('.navigationIcon').unbind('click').click(function () {

            $('.navigationIcon').toggleClass('open');
            $('.menu-parent').toggleClass('nav-open');
            $('.bg-close').toggleClass('bg-open')
        })
    },

    menuList:function () {
        $('#menuList li').on( 'click',function () {
            $('#menuList li.act').removeClass('act');
            $(this).addClass('act');
            $('.active').removeClass();

        })
    },


    searchSize: function() {
        var dataSize = [];
        $('.size li input.isize').unbind('click').click(function() {
            var _data = $(this).val();
            if ($(this).is(":checked")) {
                dataSize.push(_data);
            } else {
                var index = dataSize.indexOf(_data);
                dataSize.splice(index, 1);
            }
            var url = BASE_URL + 'tim-kiem-theo-kick-thuoc';
            var _token = $('input[name=_token]').val();
            jQuery.ajax({
                type: "POST",
                url: url,
                data: { dataSize: dataSize, _token: _token },
                success: function(data) {
                    $('#right').html(data);

                }
            });
        });
    },
    searchColor: function() {

        var dataColor = [];
        $('.color li input.iscolor').unbind('click').click(function() {
            var _data = $(this).val();
            if ($(this).is(":checked")) {
                dataColor.push(_data);
            } else {
                var index = dataColor.indexOf(_data);
                dataColor.splice(index, 1);
            }
            var url = BASE_URL + 'tim-kiem-theo-mau-sac';
            var _token = $('input[name=_token]').val();
            jQuery.ajax({
                type: "POST",
                url: url,
                data: { dataColor: dataColor, _token: _token },
                success: function(data) {
                    $('#right').html(data);
                }
            });
        });
    },
    minusButton: function() {
        $('input.minus.product-detail').unbind('click').click(function() {
            var val = $('input.qty').val();

            val--;
            if (val <= 0) val = 1;
            $('input.qty').val(val);
        });
        $('input.plus.product-detail').unbind('click').click(function() {
            var val = $('input.qty').val();
            val++;
            $('input.qty').val(val);
        });
    },

    plusButton: function() {

        $('.plus.product-cart').unbind('click').on('click', function() {

            var $qty = $(this).closest('.buttons_added').find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $('.minus.product-cart').unbind('click').on('click', function() {
            var $qty = $(this).closest('.buttons_added').find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
        });

    },


    btnTop: function() {
        if ($('.btnTop').length > 0) {
            $(window).scroll(function() {
                var e = $(window).scrollTop();
                if (e > 500) {
                    $('.btnTop').fadeIn(500);
                } else {
                    $('.btnTop').fadeOut(500);
                }
            });

            $('.btnTop').click(function() {
                $('body,html').animate({
                    scrollTop: 0
                }, 700)
            })
        }
    },
    ratingSubmit: function () {
        $('#rating_submit').unbind('click').on('click', function () {
            var url = BASE_URL + 'danh-gia-san-pham';
            var rating = $('#rating-value').val();
            var comment = $('#rating_comment').val();
            var author = $('#rating_author').val();
            var gmail = $('#rating_gmail').val();
            var product_id = $('#product_id').val();
            var _token = jQuery('input[name="_token"]').val();
            jConfirm('Bạn có muốn đánh giá không [OK]:Đồng ý [Cancel]:Bỏ qua ?', 'Xác nhận', function (r) {
                if (r) {
                    jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: {product_id: product_id ,rating: rating ,comment : comment , author:author , gmail:gmail  , _token: _token},
                        success: function (data) {
                            window.location.reload();
                        },
                        error: function (data) {
                            alert('khong the danh gia');
                        }
                    })
                }
            })
        })
    }

};