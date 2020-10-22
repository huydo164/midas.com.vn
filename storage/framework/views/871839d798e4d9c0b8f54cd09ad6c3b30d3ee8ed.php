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
                <h2><?php echo e(strip_tags($contact_title)); ?></h2>
                <p class="phone"><img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/icon-phone.png"> <?php echo e(strip_tags($contact_hotline1)); ?>  </p>
                <p class="phone"><img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/icon-phone.png"><?php echo e(strip_tags($contact_hotline2)); ?>  </p>
                <p class="home"><img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/icon-home.png"> <?php echo e(strip_tags($contact_address)); ?> </p>
                <p class="content"> <?php echo e($contact_intro); ?></p>
            </div>
            <div class="col-md-6">
                <h2>LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <div class="form">
                    <form action="<?php echo e(URL::route('site.pageContactPost')); ?>" method="POST">
                        <div class="input">
                            <input type="text" placeholder="Họ và tên" name="contact_name">
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Số điện thoại" name="contact_phone">
                        </div>
                        <div class="input mail">
                            <input type="text" placeholder="Email" name="contact_email">
                            <i class="fa fa-envelope"></i>

                        </div>
                        <div class="input">
                            <input type="text" placeholder="Ghi chú" name="contact_content">
                        </div>
                        <div class="button">
                            <button>Gửi ngay</button>
                        </div>
                        <?php echo csrf_field(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/contact.blade.php ENDPATH**/ ?>