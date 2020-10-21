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

<div class="slide-web">

</div>
<div class="service">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span><?php echo e($name_cat_dich_vu->info_intro); ?></span>
                <b></b>
            </h3>
            <div class="row">
                <?php if(isset($data_cat_dich_vu) && !empty($data_cat_dich_vu)): ?>
                    <?php $__currentLoopData = $data_cat_dich_vu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true, false)); ?>" />
                            <h3 class="chunho">
                                <b></b>
                                <span><?php echo e($item->statics_title); ?></span>
                                <b></b>
                            </h3>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                

            </div>
        </div>
    </div>
</div>
<div class="commitment">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span><?php echo e($name_cat_commitment->info_intro); ?></span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <?php if(isset($data_commitment) && !empty($data_commitment)): ?>
                <?php $__currentLoopData = $data_commitment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <a href="#">
                        <div class="box-img">
                            <div class="box-img-1">
                                <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" />
                            </div>
                        </div>

                        <div class="box-text">
                            <h5><?php echo e($item->statics_title); ?></h5>
                            <p><?php echo e(strip_tags($item->statics_content)); ?></p>
                            <button>XEM THÊM</button>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
            
        </div>
    </div>
</div>
<div class="highlights">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>CÁC DỊCH VỤ CỦA CHÚNG TÔI</span>
                <b></b>
            </h3>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=1" />
                    <span class="img-text">nightlife</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=2" />
                    <span class="img-text">abstract</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=3" />
                    <span class="img-text">animals</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=4" />
                    <span class="img-text">nature</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=5" />
                    <span class="img-text">business</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=6" />
                    <span class="img-text">cats</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=7" />
                    <span class="img-text">city</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=8" />
                    <span class="img-text">food</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=9" />
                    <span class="img-text">fashion</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=10" />
                    <span class="img-text">people</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=11" />
                    <span class="img-text">sports</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=12" />
                    <span class="img-text">technics</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=13" />
                    <span class="img-text">transport</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="collection">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span><?php echo e($name_cat_collection->info_intro); ?></span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                        <?php $__currentLoopData = $data_collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key < 1): ?>
                                <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" />
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="right">
                    <div class="row">
                        <?php $__currentLoopData = $data_collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key >= 1): ?>
                                <div class="col-md-6">
                                    <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                                        <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" />
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.collection a').fancybox();
            });
        </script>
    </div>

</div>

<div class="finish highlights">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span><?php echo e($name_cat_finish->info_intro); ?></span>
                <b></b>
            </h3>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel owl-theme">
                <?php $__currentLoopData = $data_finish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" />
                        </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>

    </div>
</div>
<div id="content">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php if(isset($dataBannerHeader) && !empty($dataBannerHeader)): ?>
                <?php $__currentLoopData = $dataBannerHeader; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item > 2): ?>
                        <div class="carousel-item active">
                            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_BANNER, $item['banner_id'], $item['banner_image'], 2000, 0, '', true, true, false)); ?>" alt="">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

    </div>
</div>
<div class="testimonials">
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
                <div class="col-md-4">
                    <div class="anh">
                        <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" />
                    </div>

                    <div class="quote">
                        <i class="fa fa-quote-right"></i>
                        <p class="quote-content">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ ...</p>
                        <p class="name">Nguyễn văn An</p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
        <a href="#" class="showmore">
            <span>XEM THÊM</span>
        </a>
    </div>

</div>
<div class="introduce">
    <div class="container">
        <?php $__currentLoopData = $data_aboutme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
        <div class="row">
        
            <div class="col-md-6">
                <div class="anh">
                    <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true)); ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-me">
                    <h5><?php echo e($item->statics_title); ?></h5>
                    <p><?php echo e(strip_tags($item->statics_content)); ?></p>
                    <button>XEM NGAY</button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/index.blade.php ENDPATH**/ ?>