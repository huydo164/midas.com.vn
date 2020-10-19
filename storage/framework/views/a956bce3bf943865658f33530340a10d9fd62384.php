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
<div class="product-detail">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="slide-img">

                        <div class="container">
                            <!-- Flickity HTML init -->
                            <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                                <?php
                                $product_image_other = ($data->product_image_other != '') ? unserialize($data->product_image_other) : [];
                                ?>
                                <?php if( !empty($product_image_other)): ?>
                                    <?php $__currentLoopData = $product_image_other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($img != ''): ?>
                                                <div class="carousel-cell"><img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $data->product_id,$img, 2000,0, '', true, true, false)); ?>"/></div>
                                         <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="carousel carousel-nav"
                                 data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                                <?php if( !empty($product_image_other)): ?>
                                    <?php $__currentLoopData = $product_image_other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($img != ''): ?>
                                            <div class="carousel-cell"><img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $data->product_id,$img, 2000,0, '', true, true, false)); ?>"/></div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div><!-- /.container -->

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="detail">
                        <div class="breadcrums">
                            <a href="#">Trang chủ</a>
                            <span>/</span>
                            <a href="#">Tượng vĩ nhân</a>
                        </div>

                        <h1 class="product-title"><?php echo e(stripslashes($data->product_title)); ?></h1>
                        <div class="product-price"><?php echo e(FuncLib::numberFormat($data->product_price)); ?>₫</div>
                        <form class="cart" action="<?php echo e(URL::route('site.pageCart')); ?>" method="post" >
                            <div class="quantity buttons_added">
                                <span class="md-number">Số lượng:</span>
                                <input type="button" value="-" class="minus product-detail button is-form">

                                <input type="number" name="product_num"  id="productNum" class="input-text qty text" step="1" min="1" max="9999" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                <input type="button" value="+" class="plus product-detail button is-form">  </div>
                                <input type="hidden" value ="<?php echo e(($data->product_id)); ?>" id="product_id" name="product_id" />
                                <?php echo e(csrf_field()); ?>


                            <button type="submit" name="add-to-cart" id="submitBuy" value="199" class="single_add_to_cart_button button alt">Mua ngay</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="bottom">
        <div class="container">
            <div class="row bot">
                <div class="col-md-9">
                    <div class="descripton">
                        <div class="tab">
                            <button class="tablinks active" onclick="openCity(event, 'descripton')">Mô tả</button>
                            <button class="tablinks" onclick="openCity(event, 'review')">Đánh giá</button>
                        </div>

                        <!-- Tab content -->
                        <div id="descripton" class="tabcontent" style="display: block;">
                            <?php echo stripslashes($data->product_content); ?>

                        </div>

                        <div id="review" class="tabcontent" style="display: none;">
                            <h3 class="reply-title">
                                Hãy là người đầu tiên nhận xét “tượng mạ vàng bác hồ 01”
                            </h3>
                            <form action="">
                                <div class="rating">
                                    <p>Đánh giá của bạn</p>
                                </div>
                                <div class="comment">
                                    <label for="comment">Nhận xét của bạn</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                </div>
                                <div class="author">
                                    <p class="name">
                                        <label>Tên *</label>
                                        <input id="author" name="author" type="text" />
                                    </p>
                                    <p class="email">
                                        <label for="gmail">Gmail *</label>
                                        <input id="gmail" name="gmail" type="text" />
                                    </p>
                                </div>
                                <div class="form-cookie">
                                    <input name="form-cookie" type="checkbox" />
                                    <label for="form-cookie">Lưu tên của tôi, email, và trang web trong trình duyệt này cho lần bình luận kế tiếp của tôi.</label>
                                </div>
                                <div class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Gửi đi">
                                </div>
                            </form>
                        </div>

                        <script>
                            function openCity(evt, cityName) {
                                // Declare all variables
                                var i, tabcontent, tablinks;

                                // Get all elements with class="tabcontent" and hide them
                                tabcontent = document.getElementsByClassName("tabcontent");
                                for (i = 0; i < tabcontent.length; i++) {
                                    tabcontent[i].style.display = "none";
                                }

                                // Get all elements with class="tablinks" and remove the class "active"
                                tablinks = document.getElementsByClassName("tablinks");
                                for (i = 0; i < tablinks.length; i++) {
                                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                                }

                                // Show the current tab, and add an "active" class to the button that opened the tab
                                document.getElementById(cityName).style.display = "block";
                                evt.currentTarget.className += " active";
                            }
                        </script>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="news">
                            <h4> TIN TỨC</h4>
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
                        <div class="lich">
                            <iframe style="padding:0;border:none;overflow:hidden; width: 100%;height:300px" src="//amlich.com/#type=7&amp;bg=2&amp;color=3"></iframe>
                        </div>
                        <div class="keyword">
                            <h2>Từ khóa</h2>
                            <div class="list-key">
                                <ul>
                                    <li><a href="">Tượng</a></li>
                                    <li><a href="">Vàng</a></li>
                                    <li><a href="">Mạ vàng</a></li>
                                    <li><a href="">Vật phẩm</a></li>
                                    <li><a href="">Kích thước</a></li>
                                    <li><a href="">Video</a></li>
                                    <li><a href="">Tin dùng</a></li>
                                    <li><a href="">Giá tiền</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="similar-product">
        <div class="container">
            <div class="title">
                <h3>
                    <b></b>
                    <span>SẢN PHẨM TƯƠNG TỰ</span>
                    <b></b>
                </h3>
            </div>
            <div class="carousel-wrap">
                <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                    <?php $__currentLoopData = $dataSame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-cell">
                            <img src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item['product_id'], $item['product_image'], 2000,0, '', true, true, false)); ?>"/>
                            <div class="nd">
                                <a title="<?php echo e($item->product_title); ?>" href="<?php echo e(FuncLib::buildLinkProduct($item->product_id, $item->product_title)); ?>">
                                    <p class="name"><?php echo e(stripslashes($item->product_title)); ?></p>
                                </a>
                                <p class="price"><?php echo e(FuncLib::numberFormat ($item->product_price)); ?>₫</p>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Statics/Views/content/pageProduct.blade.php ENDPATH**/ ?>