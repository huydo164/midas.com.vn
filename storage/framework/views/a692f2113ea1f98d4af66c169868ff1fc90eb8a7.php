<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\ThumbImg;
?>
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrTextLogo->info_id, $arrTextLogo->info_img, 800, 0, '', true, true)); ?>"/>
            <h6><?php echo isset($arrTextLogo->info_content) ? $arrTextLogo->info_content : ''; ?></h6>
            <p><?php echo isset($text1->info_content) ? $text1->info_content : ''; ?>: <span><?php echo isset($text_sdt->info_content) ? $text_sdt->info_content : ''; ?></span> </p>
            <p><?php echo isset($text_add->info_content) ? $text_add->info_content : ''; ?></p>
            <p> <i class="far fa-envelope"></i> <?php echo isset($text_mail->info_content) ? $text_mail->info_content : ''; ?></p>
        </div>
    </div>
    <div class="footer-mid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><?php echo e(isset($name_cat_support->info_intro ) ? $name_cat_support->info_intro  : ''); ?></h2>
                    <div class="gach"></div>
                    <ul>
                        <?php if(isset($data_support) && !empty($data_support)): ?>
                            <?php $__currentLoopData = $data_support; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>"><?php echo e($item->statics_title); ?></a>
                        </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4">
                <h2><?php echo e(isset($name_cat_chinhsach->info_intro ) ? $name_cat_chinhsach->info_intro  : ''); ?></h2>
                    <div class="gach"></div>
                    <ul>
                        <?php if(isset($data_chinhsach) && !empty($data_chinhsach)): ?>
                            <?php $__currentLoopData = $data_chinhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)); ?>"><?php echo e($item->statics_title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4">
                <h2><?php echo e(isset($name_cat_hotline->info_intro ) ? $name_cat_hotline->info_intro  : ''); ?></h2>
                    <div class="gach"></div>
                    <ul>
                        <?php if(isset($data_hotline) && !empty($data_hotline)): ?>
                            <?php $__currentLoopData = $data_hotline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="#"><?php echo e($item->statics_title); ?></a>
                        </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="container">
            <p><?php echo isset($text_bot->info_content ) ? $text_bot->info_content  : ''; ?></p>
        </div>
    </div>
    <div class="scroll-top">
        <button class="btnTop"><i class="fas fa-chevron-up"></i></button>
    </div>
</div>

<?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Statics/Views/block/footer.blade.php ENDPATH**/ ?>