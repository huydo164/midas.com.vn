<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\ThumbImg;
?>
<div class="header">
    <?php echo isset($messages) && ($messages != '') ? $messages : ''; ?>

    <div class="bg-close"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div class="logo">
                    <?php if(isset($arrTextLogo) && !empty($arrTextLogo)): ?>
                        <a href="">
                            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrTextLogo->info_id, $arrTextLogo->info_img, 800,0, '', true, true)); ?>" />
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="menu-top">
                    <div class="navigation">
                        <span class="navigationIcon">
                            <span class="line top"></span>
                            <span class="line mid"></span>
                            <span class="line bot"></span>
                        </span>
                        <ul class="menu-parent" id="menuList">
                            <?php if(isset($arrCategory) && !empty($arrCategory)): ?>
                                <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cat->category_menu == CGlobal::status_show && $cat->category_parent_id == 0): ?>
                                        <?php $i=0 ?>
                                        <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id): ?>
                                                <?php $i++; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a <?php if($i > 0): ?> <?php endif; ?> title="<?php echo e($cat->category_title); ?>" href="<?php if($cat->category_link_replace != ''): ?><?php echo e($cat->category_link_replace); ?><?php else: ?><?php echo e(FuncLib::buildLinkCategory($cat->category_id, $cat->category_title)); ?><?php endif; ?>" >
                                                <?php echo e($cat->category_title); ?>

                                                <?php if($i>0): ?> <i class="fas fa-angle-down"></i> <?php endif; ?>
                                            </a>
                                            <?php if($i > 0): ?>
                                                <ul class="menu-sub">

                                                    <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id &&  $cat->category_id == 681): ?>
                                                            <li>
                                                                <a title="<?php echo e($sub->category_title); ?>" href="<?php if($sub->category_link_replace != ''): ?><?php echo e($sub->category_link_replace); ?><?php else: ?><?php echo e(FuncLib::buildLinkDetailProduct($sub->category_id, $sub->category_title)); ?><?php endif; ?>">
                                                                    <?php echo e(stripcslashes($sub->category_title)); ?>

                                                                </a>
                                                            </li>
                                                        <?php elseif($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id): ?>
                                                            <li>
                                                                <a title="<?php echo e($sub->category_title); ?>" href="<?php if($sub->category_link_replace != ''): ?><?php echo e($sub->category_link_replace); ?><?php else: ?><?php echo e(FuncLib::buildLinkDetailStatic($sub->category_id, $sub->category_title)); ?><?php endif; ?>"><?php echo e(stripcslashes($sub->category_title)); ?>

                                                                </a>

                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Statics/Views/block/header.blade.php ENDPATH**/ ?>