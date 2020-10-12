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
<div class="content">
    <div class="container">
        <div class="category-page-title">
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo e(FuncLib::getBaseURL()); ?>">Trang chủ</a>
                </li>
                <li class="active">
                    <a href="#">Tượng địa danh</a>
                </li>
            </ul>
        </div>
        <div class="noidung">
            <div class="row">
                <div class="col-md-3">
                    <div class="left">
                        <div class="menu">
                            <h4><i class="fas fa-bars"></i> DANH MỤC SẢN PHẨM</h4>
                            <div class="list-service">
                                <ul>
                                    <?php if(isset($arrCategory) && !empty($arrCategory)): ?>
                                    <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($cat->category_id == 680): ?>
                                    <ul class="menu-sub">
                                        <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $sub->category_parent_id == $cat->category_id): ?>
                                        <li>
                                            <a title="<?php echo e($sub->category_title); ?>" href="<?php if($sub->category_link_replace != ''): ?><?php echo e($sub->category_link_replace); ?><?php else: ?><?php echo e(FuncLib::buildLinkDetailStatic($sub->category_id, $sub->category_title)); ?><?php endif; ?>">
                                                <?php echo e(stripcslashes($sub->category_title)); ?>

                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                        <div class="search">
                            <form action="">
                                <div class="input">
                                    <input type="text" />
                                </div>
                                <div class="icon">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </div>
                            </form>
                        </div>
                        <div class="price">

                            <form action="" method="get">
                                <div id="slider-range"></div>
                                <p>
                                    <button type="submit">Lọc</button>
                                    <input type="text" id="amount" readonly style="border:0; color:white; font-weight:bold;">
                                </p>
                            </form>

                            <script>
                                $(function() {
                                    $("#slider-range").slider({
                                        range: true,
                                        min: 4200000,
                                        max: 7600000,
                                        values: [4200000, 7600000],
                                        slide: function(event, ui) {
                                            $("#amount").val("Giá : " + ui.values[0] + "₫ - " + ui.values[1] + " ₫ ");
                                        }
                                    });
                                    $("#amount").val("Giá : " + $("#slider-range").slider("values", 0) + " ₫ - " +
                                        $("#slider-range").slider("values", 1) + " ₫");
                                });
                            </script>
                        </div>
                        <div class="size">
                            <h4><i class="fas fa-bars"></i> DANH MỤC SẢN PHẨM</h4>
                            <ul>
                                <li>
                                    <a href="#">31 cm</a>
                                    <span>
                                        (2)
                                    </span>
                                </li>
                                <li>
                                    <a href="#">32 cm</a>
                                    <span>
                                        (3)
                                    </span>
                                </li>
                                <li>
                                    <a href="#">33 cm</a>
                                    <span>
                                        (4)
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="color">
                            <h4><i class="fas fa-bars"></i> TÌM KIẾM THEO MÀU SẮC</h4>
                            <ul>
                                <li>
                                    <a href="#">Màu đỏ</a>
                                    <span>
                                        (2)
                                    </span>
                                </li>
                                <li>
                                    <a href="#">Màu vàng</a>
                                    <span>
                                        (2)
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="news">
                            <h4><i class="fas fa-bars"></i> TIN TỨC</h4>
                            <ul>
                                <li>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                            </a>
                                        </div>
                                        <div class="col-md-8">

                                            <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                            </a>

                                            <p class="time">
                                                3 Tháng Tư , 2018
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                            </a>
                                        </div>
                                        <div class="col-md-8">

                                            <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                            </a>

                                            <p class="time">
                                                3 Tháng Tư , 2018
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                            </a>
                                        </div>
                                        <div class="col-md-8">

                                            <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                            </a>

                                            <p class="time">
                                                3 Tháng Tư , 2018
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                            </a>
                                        </div>
                                        <div class="col-md-8">

                                            <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                            </a>

                                            <p class="time">
                                                3 Tháng Tư , 2018
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="#">
                                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                            </a>
                                        </div>
                                        <div class="col-md-8">

                                            <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                            </a>

                                            <p class="time">
                                                3 Tháng Tư , 2018
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="fanpage">
                            <h4><i class="fas fa-bars"></i> FANPAGE</h4>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">
                    <div class="right">
                        <p class="gt">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ vàng sau đây đã và đang gây sốt trong cộng đồng những người đam mê sự khác biệt và thích những món hàng xa xỉ.</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                    </div>
                                    <div class="nd">
                                        <p class="name">TƯỢNG MẠ VÀNG BÁC HỒ</p>
                                        <p class="price">7.600.000₫</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Statics/Views/content/product_portfolio.blade.php ENDPATH**/ ?>