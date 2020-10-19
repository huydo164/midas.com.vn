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
    <div id="page-project">
        <div id="pd-page">
            <div class="container">
                <div class="title-project txt-center">
                    <?php if(isset($dataCate->category_id)): ?>
                        <h4><?php echo e($dataCate->category_title); ?></h4>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="project-done">
                            <?php if(isset($data_finish) && !empty($data_finish)): ?>
                                <?php $__currentLoopData = $data_finish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="pro-contro txt-center">
                                        <h4 class=" mg-bot"><a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>" title="<?php echo e($item->statics_title); ?>"><?php echo e($item->statics_title); ?></a></h4>
                                        <div class="date ">
                                            <span class="pr-2"><?php echo isset($text_post) ? strip_tags($text_post) : ''; ?> </span>
                                            <span class="cb pr-2"><?php echo e(date('d/m/Y', $item->statics_created)); ?></span>
                                            <span class="pr-2"><?php echo isset($text_by) ? strip_tags($text_by) : ''; ?></span>
                                            <span class="pr-2 cb">ADMIN</span>
                                        </div>
                                        <div class="img-project">
                                            <a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>" title="<?php echo e($item->statics_title); ?>">
                                                <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 2000,0, '', true, true)); ?>", width="100%" alt="">
                                            </a>
                                            <div class="date-box">
                                                <p><?php echo e(date('d', $item->statics_created)); ?></p>
                                                <p class="f-s">Th<?php echo e(date('m', $item->statics_created)); ?></p>
                                            </div>
                                        </div>
                                        <p class="pro-intro"><?php echo e($item->statics_intro); ?></p>
                                        <div class="btn-read mb-5">
                                            <a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>" title="<?php echo e($item->statics_title); ?>"><?php echo isset($text_continue) ? strip_tags($text_continue) : ''; ?> -></a>
                                        </div>
                                        <div class="pro-bot">
                                            <div class="float-left">
                                                <?php echo isset($text_post_in) ? strip_tags($text_post_in) : ''; ?>

                                                <span><?php echo e(isset($dataCate->category_id) ? $dataCate->category_title : ''); ?></span>
                                            </div>
                                            <div class="float-right"><a href=""><?php echo e(isset($text_comment) ? strip_tags($text_comment) : ''); ?></a></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!---------row---------->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageProject.blade.php ENDPATH**/ ?>