$(document).ready(function ($) {
    STATICS.navigationIcon();

    // STATICS.carousel();
    STATICS.searchSize();
    STATICS.searchColor();
    STATICS.minusButton();
    STATICS.plusButton();

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


    searchSize:function(){
        var dataSize = [];
        $('.size li input.isize').unbind('click').click(function(){
            var _data = $(this).val();
            if($(this).is(":checked")){
                dataSize.push(_data);
            }else{
                var index = dataSize.indexOf(_data);
                dataSize.splice(index,1);
            }
            var url = BASE_URL + 'tim-kiem-theo-kick-thuoc';
            var _token = $('input[name=_token]').val();
            jQuery.ajax({
                type : "POST",
                url: url,
                data :{dataSize:dataSize, _token:_token},
                success : function (data) {
                    $('#right').html(data);

                }
            });
        });
    },
    searchColor:function(){

        var dataColor = [];
        $('.color li input.iscolor').unbind('click').click(function(){
            var _data = $(this).val();
            if($(this).is(":checked")){
                dataColor.push(_data);
            }else{
                var index = dataColor.indexOf(_data);
                dataColor.splice(index,1);
            }
            var url = BASE_URL + 'tim-kiem-theo-mau-sac';
            var _token = $('input[name=_token]').val();
            jQuery.ajax({
                type : "POST",
                url: url,
                data :{dataColor:dataColor, _token:_token},
                success : function (data) {
                    $('#right').html(data);

                }
            });
        });
    },
    minusButton:function (){
        $('input.minus.product-detail').click(function (){
            var val = $('input.qty').val();

            val -- ;
            if(val <= 0) val = 1;
            $('input.qty').val(val);
        });
        $('input.plus.product-detail').click(function (){
            var val = $('input.qty').val();
            val ++ ;
            $('input.qty').val(val);
        });
    },

    plusButton:function (){

            $('.plus.product-cart').on('click',function(){

                var $qty=$(this).closest('.buttons_added').find('.qty');
                var currentVal = parseInt($qty.val());
                if (!isNaN(currentVal)) {
                    $qty.val(currentVal + 1);
                }
            });
            $('.minus.product-cart').on('click',function(){
                var $qty=$(this).closest('.buttons_added').find('.qty');
                var currentVal = parseInt($qty.val());
                if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
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