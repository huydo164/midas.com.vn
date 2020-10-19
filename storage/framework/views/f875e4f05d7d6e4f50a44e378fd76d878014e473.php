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
    <div class="thumb-header">
        <?php if(isset($dataBannerPage) && !empty($dataBannerPage)): ?>
            <?php $__currentLoopData = $dataBannerPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_BANNER, $item['banner_id'], $item['banner_image'], 2000,0, '', true, true, false)); ?>" width="100%" alt="">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div id="page-detail">
        <div id="pd-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="dich-vu">
                            <?php if(isset($data) && !empty($data)): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4><?php echo e($item->statics_title); ?></h4>
                                    <div class="tt-service">
                                        <?php echo stripslashes($item->statics_content); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(isset($pageDetail) && !empty($pageDetail)): ?>
                                    <h4><?php echo e($pageDetail->statics_title); ?></h4>
                                    <div class="tt-service">
                                        <?php echo stripslashes($pageDetail->statics_content); ?>

                                    </div>
                            <?php endif; ?>
                        </div>
                        <div class="blog-share">
                            <div class="divider"></div>
                            <div class="social-icon">
                                <a href="" class=" btn-face box"><i class="fab fa-facebook-f"></i></a>
                                <a href="" class=" btn-twit box"><i class="fab fa-twitter"></i></a>
                                <a href="" class=" btn-envelop box"><i class="far fa-envelope"></i></a>
                                <a href="" class=" btn-print box"><i class="fab fa-pinterest"></i></a>
                                <a href="" class=" btn-gg box"><i class="fab fa-google-plus-g"></i></a>
                                <a href="" class=" btn-link box"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------row---------->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageStaticsDetail.blade.php ENDPATH**/ ?>