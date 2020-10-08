<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\ThumbImg;
?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/logo.png" />
            </div>
            <div class="col-md-9">
                <ul>
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
                                <a <?php if($i > 0): ?> <?php endif; ?> title="<?php echo e($cat->category_title); ?>" >
                                    <?php echo e($cat->category_title); ?>

                                </a>
                                <?php if($i > 0): ?>
                                    <ul class="menu-sub">
                                        <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id): ?>
                                                <li>
                                                    <a title="<?php echo e($sub->category_title); ?>">
                                                        <?php echo e(stripcslashes($sub->category_title)); ?>

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
</div><?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Statics/Views/block/header.blade.php ENDPATH**/ ?>