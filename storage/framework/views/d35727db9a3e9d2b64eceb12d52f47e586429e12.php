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
    <div id="pd-page">
        <div class="container">
            <div class="info-service">
                <h2><?php echo isset($text_dich_vu) ? strip_tags($text_dich_vu) : ''; ?></h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $__env->make('Statics::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <div class="dich-vu">
                        <h4><?php echo $dich_vu_1->info_title; ?></h4>
                        <p class="tt-service">
                            <?php echo strip_tags($dich_vu_1->info_content); ?>

                        </p>
                        <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $dich_vu_1->info_id, $dich_vu_1->info_img, 800, 0, '', true, true)); ?>" alt="">
                        <h4 style="text-align: center;  margin-top: 20px"><?php echo $dich_vu_2->info_title; ?></h4>
                        <p><?php echo strip_tags($dich_vu_2->info_content); ?></p>
                        <span><img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $image_1->info_id, $image_1->info_img, 800, 0, '', true, true)); ?>" alt=""></span>
                        <span><img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $image_2->info_id, $image_2->info_img, 800, 0, '', true, true)); ?>" alt=""></span>
                        <span><img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $image_3->info_id, $image_3->info_img, 800, 0, '', true, true)); ?>" alt=""></span>
                        <h4 style="text-align: center;  margin-top: 20px"><?php echo $dich_vu_2->info_title; ?></h4>
                        <p><?php echo strip_tags($dich_vu_2->info_content); ?></p>
                        <div class="click-link">
                            <ul>
                                <?php if(isset($data_cong_trinh) && !empty($data_cong_trinh)): ?>
                                    <?php $__currentLoopData = $data_cong_trinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href=""><?php echo e($item->statics_title); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!---------row---------->

            <div class="commitment">
                <h3>
                    <b></b>
                    <span>Sản phẩm nổi bật</span>
                    <b></b>
                </h3>
            </div>
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">nightlife</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">abstract</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">animals</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">nature</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">business</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">cats</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">city</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">food</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">fashion</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">people</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">sports</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">technics</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">transport</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageService.blade.php ENDPATH**/ ?>