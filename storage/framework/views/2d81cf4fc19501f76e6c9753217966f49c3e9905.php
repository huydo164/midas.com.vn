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
    <div id="page-search">
        <div id="pd-page">
            <div class="container">
                <div class="title-project txt-center">
                    <p class="count"> <?php if(isset($data)  && $data->count(['statics_id']) > 0 ): ?> Tìm thấy <?php echo e($data->count(['statics_id'])); ?> bài viết <?php else: ?> Không tìm thấy bài viết phù hợp <p>
                        <a href="<?php echo e(FuncLib::getBaseURL()); ?>">Quay về trang chủ</a> </p> <?php endif; ?>
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="project-done">
                            <?php if(isset($data) && !empty($data)): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="pro-contro txt-center">
                                        <h4 class=" mg-bot"><a href="<?php echo e(FuncLib::BuildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>" title="<?php echo e($item->statics_title); ?>"><?php echo e($item->statics_title); ?></a></h4>
                                        <div class="date ">
                                            <span class="pr-2"><?php echo isset($text_post) ? strip_tags($text_post) : ''; ?> </span>
                                            <span class="cb pr-2"><?php echo e(date('d/m/Y', $item->statics_created)); ?></span>
                                            <span class="pr-2"><?php echo isset($text_by) ? strip_tags($text_by) : ''; ?></span>
                                            <span class="pr-2 cb">ADMIN</span>
                                        </div>
                                        <div class="img-project">
                                            <a href="<?php echo e(FuncLib::BuildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>" title="<?php echo e($item->statics_title); ?>">
                                                <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 2000,0, '', true, true)); ?>", width="100%" alt="">
                                            </a>
                                            <div class="date-box">
                                                <p><?php echo e(date('d', $item->statics_created)); ?></p>
                                                <p class="f-s">Th<?php echo e(date('m', $item->statics_created)); ?></p>
                                            </div>
                                        </div>
                                        <p class="pro-intro"><?php echo e($item->statics_intro); ?></p>
                                        <div class="btn-read mb-5">
                                            <a href="<?php echo e(FuncLib::BuildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>" title="<?php echo e($item->statics_title); ?>"><?php echo isset($text_continue) ? strip_tags($text_continue) : ''; ?> -></a>
                                        </div>
                                        <div class="pro-bot">
                                            <div class="float-left">
                                                <?php echo isset($text_post_in) ? strip_tags($text_post_in) : ''; ?>

                                                <span><?php echo e($item->statics_title); ?></span>
                                                |
                                                <?php echo isset($text_tagged) ? strip_tags($text_tagged) : ''; ?>

                                                <?php $__currentLoopData = $dataTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span><a href="<?php echo e(FuncLib::buildLinkTag($key, $item)); ?>" title="<?php echo e($item); ?>"><?php echo e($item); ?></a></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="float-right"><a href=""><?php echo e(isset($text_comment) ? strip_tags($text_comment, true) : []); ?></a></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <?php if(isset($data) && $data->count() > 1): ?>
                            <div class="listPaginatePage">
                                <div class="showListPage"><?php echo $paging; ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!---------row---------->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageSearch.blade.php ENDPATH**/ ?>