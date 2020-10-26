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
    <div id="page-service">
        <div id="pd-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">

                        <div class="dich-vu">
                            <?php if(isset($data) && !empty($data)): ?>
                                <h4><?php echo e($data->statics_title); ?></h4>
                                <?php echo stripslashes($data->statics_content); ?>

                            <?php endif; ?>
                        </div>
                        <div class=" bg-none">
                            <?php if(isset($arrSame) && !empty($arrSame)): ?>
                                <ul>
                                    <?php $__currentLoopData = $arrSame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->category_id != 703): ?>
                                            <li><a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->category_id, $item->category_title)); ?>"><?php echo e($item->category_title); ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!---------row---------->

                <div class="commitment">
                    <h3>
                        <b></b>
                        <span><?php echo isset($text_san_pham_noi_bat) ? strip_tags($text_san_pham_noi_bat) : ''; ?></span>
                        <b></b>
                    </h3>
                </div>
                <div class="carousel-wrap slide-service">
                    <div class="carousel" data-flickity='{  "lazyLoad": true , "prevNextButtons": false, "groupCells": true, "freeScroll": true, "wrapAround": true, "pageDots" : false}'>

                        <?php if( isset($data_product) && !empty($data_product)): ?>
                            <?php $__currentLoopData = $data_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-cell">
                                        <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item->product_id, $item->product_image, 800, 0, '', true, true)); ?>" />
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageServices.blade.php ENDPATH**/ ?>