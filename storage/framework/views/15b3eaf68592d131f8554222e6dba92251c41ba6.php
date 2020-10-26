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
                <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_BANNER, $item['banner_id'],$item['banner_image'], 0,0, '', true, true, false)); ?>" alt="">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <div id="pd-page">
        <div class="container">
            <div class="page-company">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="commitment">
                            <h3>
                                <b></b>
                                <span><?php echo $data->statics_title; ?></span>
                                <b></b>
                            </h3>
                        </div>
                        <div class="dich-vu">
                            <?php echo stripslashes($data->statics_content); ?>

                        </div>
                        <div class="linkPage">
                            <ul>
                                <?php if(isset($data_id) && !empty($data_id)): ?>
                                    <?php $__currentLoopData = $data_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->category_id != 703): ?>
                                            <li><a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->category_id, $item->category_title)); ?>"><?php echo $item->category_title; ?>.</a></li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!---------row---------->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageCompany.blade.php ENDPATH**/ ?>