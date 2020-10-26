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
        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/banner01.jpg" alt="">
    </div>
    <div id="pd-page">
        <div class="container">
            <div class="page-library">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="commitment">
                            <h3>
                                <b></b>
                                <span>Thư viện ảnh</span>
                                <b></b>
                            </h3>
                        </div>
                        <div class="dich-vu">
                            <?php if(isset($data_thu_vien) && !empty($data_thu_vien)): ?>
                                <?php $__currentLoopData = $data_thu_vien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <h4><?php echo $item->statics_title; ?></h4>
                                    <p class="tt-service">
                                        <?php echo $item->statics_content; ?>

                                    </p>
                                    <?php
                                        $statics_image_other = ($item->statics_image_other != '') ? unserialize($item->statics_image_other) : [] ;
                                    ?>
                                    <div class="carousel-wrap slide-library">
                                        <div class="carousel" data-flickity='{  "lazyLoad": true , "prevNextButtons": false, "groupCells": true, "freeScroll": true, "wrapAround": true, "pageDots" : false}'>

                                            <?php if( !empty($statics_image_other)): ?>
                                                <?php $__currentLoopData = $statics_image_other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($img != ''): ?>
                                                        <div class="carousel-cell">
                                                            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $img, 800, 0, '', true, true)); ?>" />
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!---------row---------->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageLibrary.blade.php ENDPATH**/ ?>