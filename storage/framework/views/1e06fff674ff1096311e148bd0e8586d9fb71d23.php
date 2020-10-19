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
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-name" colspan="3">Sản phẩm</th>
                            <th class="product-price">Giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="product-subtotal">Tổng cộng</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form method="post" action="<?php echo e(URL::route('site.updateCart')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <?php $total_price = 0; ?>
                            <?php if(isset($info) && sizeof($info) > 0): ?>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="woocommerce-cart-form__cart-item cart_item">

                                        <td class="product-remove">
                                            <a href="javascript:void(0)" class="remove remove-cart" aria-label="Xóa sản phẩm này" data-product_id="<?php echo e($item['id']); ?>" data-product_sku="">×</a>
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="#"><img width="180" height="180" src="<?php echo e(ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item['id'], $item['image'], 2000,0, '', true, true, false)); ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="" loading="lazy"  sizes="(max-width: 180px) 100vw, 180px"></a>
                                        </td>

                                        <td class="product-name" data-title="Sản phẩm">
                                            <a href="#"><?php echo e(stripslashes($item['title'])); ?></a>
                                        </td>

                                        <td class="product-price" data-title="Giá">
                                            <span class="woocommerce-Price-amount amount"><?php echo e(FuncLib::numberFormat($item['price'])); ?><span class="woocommerce-Price-currencySymbol">₫</span></span>
                                        </td>

                                        <td class="product-quantity" data-title="Số lượng">
                                            <div class="quantity buttons_added">
                                                <span class="md-number">Số lượng:</span>
                                                <input type="button" value="-" class="minus button is-form product-cart">
                                                <input type="number" class="input-text qty text" step="1" min="1" max="9999" name="number[<?php echo e($item['id']); ?>]" value="<?php echo e($item['num']); ?>" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">

                                                <input type="button" value="+" class="plus button is-form product-cart">

                                            </div>
                                        </td>
                                        <?php $price_num = $item['price']*$item['num'] ; $total_price += $price_num; ?>
                                        <td class="product-subtotal" data-title="Tổng cộng">
                                            <span class="woocommerce-Price-amount amount"><?php echo e(FuncLib::numberFormat($price_num)); ?><span class="woocommerce-Price-currencySymbol">₫</span></span>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>



                        <tr>
                            <td colspan="6" class="actions clear">
                                <div class="continue-shopping pull-left text-left">
                                    <a class="button-continue-shopping button primary is-outline" href="#">
                                        ← Tiếp tục xem sản phẩm
                                    </a>
                                </div>
                                <input type="submit" class="button primary mt-0 pull-left small update-cart" name="update_cart" value="Cập nhật giỏ hàng" >
                			</td>
                        </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5">
                    <div class="cart_totals ">

                        <table cellspacing="0">
                            <thead>
                            <tr>
                                <th class="product-name" colspan="2" style="border-width:3px;">Tổng số lượng</th>
                            </tr>
                            </thead>
                        </table>



                        <table cellspacing="0" class="shop_table shop_table_responsive">


                            <tr class="order-total">
                                <th>Tổng cộng</th>
                                <td data-title="Tổng cộng"><strong><span class="woocommerce-Price-amount amount"><?php echo e(FuncLib::numberFormat($total_price)); ?><span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
                            </tr>


                         </table>

                        <div class="wc-proceed-to-checkout">
                            <form action="<?php echo e(URL::Route('site.pagePay')); ?>" method="post">
                                <input type="hidden" name="total_price" value="<?php echo e($total_price); ?>" />
                                <button type="submit" class="checkout-button button alt wc-forward">
                                    Tiến hành thanh toán
                                </button>
                                <?php echo e(csrf_field()); ?>

                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/pageCart.blade.php ENDPATH**/ ?>