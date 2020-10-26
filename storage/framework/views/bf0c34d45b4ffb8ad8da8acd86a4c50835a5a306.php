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
    <div class="customer">
        <div class="container">
            <div class="title">
                <h3>
                    <b></b>
                    <span><?php echo e($name_cat_testimonials->info_intro); ?></span>
                    <b></b>
                </h3>
            </div>
            <div class="row">
                <?php $__currentLoopData = $data_testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="testi-wrapper">
                        <div class="testi-details">
                            <div class="clinet-img #SHOW_IMG">
                                <a>
                                    <img title="Nguyễn văn An" src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" alt="">
                                </a>
                            </div>
                            <div class="testi-text">
                                <div class="row">
                                    <span class="testi-name">Nguyễn văn An</span>

                                </div>

                                <div class="row">
                                    <span class="stars">
                                        <div class="wrapperStars_fe">
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="clear">

                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="quotes ">
                            <div class="quote-content">
                                <a></a><p><a>Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm&nbsp;mạ vàng&nbsp;sau đây đã và đang gây sốt trong cộng đồng những người đam mê sự khác biệt và thích những món h...</a>
                                </p></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageCustomer.blade.php ENDPATH**/ ?>