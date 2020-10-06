<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('Statics::block.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('Statics::block.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.30646626009!2d105.87504985471283!3d20.980348873780464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135afd765487289%3A0x21bd5839ba683d5f!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gLSBL4bu5IHRodeG6rXQgQ8O0bmcgbmdoaeG7h3A!5e0!3m2!1svi!2s!4v1601969237473!5m2!1svi!2s" width="100%" height="600px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>MIDAS - VẬT PHẨM DÁT VÀNG</h2>
                <p class="phone"><img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/icon-phone.png"> Hotline: <span class="sdt">01159.865.523</span> </p>
                <p class="phone"><img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/icon-phone.png"> Hotline: <span class="sdt">01159.865.523</span> </p>
                <p class="home"><img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/icon-home.png"> Địa chỉ: Số 12 ngõ 34 đường lĩnh nam – Hoàng Mai – Hà Nội </p>
                <p class="content">MIDAS là một trong những cơ sở mạ vàng lớn – uy tín – chất lượng. Chúng tôi chuyên sản xuất và phân phối các sản phẩm mạ vàng với nhiều mẫu mã đa dạng và phong phú với mong muốn đem lại những sản phẩm tốt nhất cho người dùng cả về chất lượng kỹ thuật và mỹ thuật. Với đặc thù sản xuất trực tiếp, giao hàng tận tay không qua bất kì khâu trung gian nào nên giá thành sản phẩm của chúng tôi luôn rẻ nhất, cạnh tranh nhất so với những sản phẩm cùng loại. </p>
            </div>
            <div class="col-md-6">
                <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <div class="form">
                    <form action="">
                        <div class="input">
                            <input type="text" placeholder="Họ và tên">
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Số điện thoại">
                        </div>
                        <div class="input mail">
                            <input type="text" placeholder="Email">
                            <i class="fa fa-envelope"></i>

                        </div>
                        <div class="input">
                            <input type="text" placeholder="Ghi chú">
                        </div>
                        <div class="button">
                            <button>Gửi ngay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Statics/Views/content/contact.blade.php ENDPATH**/ ?>