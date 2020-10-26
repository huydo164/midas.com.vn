<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

<div id="left-page">
    <?php if(isset($objData) && !empty($objData) && $objData  > 0 || isset($arrData->category_id) && !empty($arrData->category_id) && $arrData->category_id > 0): ?>
        <h4><i class="fas fa-bars"></i> <?php echo e(isset($text_danh_muc_san_pham) ? strip_tags($text_danh_muc_san_pham) : ''); ?></h4>
        <div class="list-service">
            <ul>
                <?php if(isset($arrCategory) && !empty($arrCategory)): ?>
                    <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($cat->category_id == $cat_dmsp): ?>
                            <ul class="menu-sub">
                                <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $sub->category_parent_id == $cat->category_id): ?>
                                        <li>
                                            <a title="<?php echo e($sub->category_title); ?>" href="<?php if($sub->category_link_replace != ''): ?><?php echo e($sub->category_link_replace); ?><?php else: ?><?php echo e(FuncLib::buildLinkDetailProduct($sub->category_id, $sub->category_title)); ?><?php endif; ?>">
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
    <?php endif; ?>
    <div class="info-service">
        <?php if(isset($arrCategory) && !empty($arrCategory)): ?>

           <h2>
               <?php $__currentLoopData = $arrCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if($cat->category_id == 680 && isset($cat->category_id)): ?>
                       <?php echo isset($text_dich_vu) ? strip_tags($text_dich_vu) : ''; ?>

                   <?php elseif($cat->category_id == 682): ?>
                       <?php echo isset($text_dvct) ? strip_tags($text_dvct) : ''; ?>

                   <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </h2>

        <?php endif; ?>
    </div>
    <div class="service-menu">
        <div class="list-service">
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
        </div>
    </div>

    <div class="search-box">
        <?php if(isset($dataCate->category_id) && !empty($dataCate->category_id)): ?>
            <?php if($dataCate->category_id > 0 ): ?>
                <form action="<?php echo e(URL::route('site.pageSearch')); ?>" method="GET" id="formSearch">
                    <input type="text" class="form-control" name="statics_title" autocomplete="off" id="inputBox" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-primary btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            <?php endif; ?>
        <?php elseif(isset($pageDetail->statics_id) && !empty($pageDetail->statics_id)): ?>
            <?php if($pageDetail->statics_id > 0): ?>
                <form action="<?php echo e(URL::route('site.pageSearch')); ?>" method="GET" id="formSearch">
                    <input type="text" class="form-control" name="statics_title" autocomplete="off" id="inputBox" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-primary btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            <?php endif; ?>
        <?php elseif(isset($objSearch->statics_id) && !empty($objSearch->statics_id)): ?>
            <?php if($objSearch->statics_id > 0): ?>
                <form action="<?php echo e(URL::route('site.pageSearch')); ?>" method="GET" id="formSearch">
                    <input type="text" class="form-control" name="statics_title" autocomplete="off" id="inputBox" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-primary btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!----------service----------->

    <?php if(isset($data) && !empty($data)): ?>
        <div class="keyword">
            <h2><?php echo isset($text_tu_khoa) ? strip_tags($text_tu_khoa) : ''; ?></h2>
            <div class="list-key">
                <?php $statics_tag = (isset($data->statics_tag) && $data->statics_tag != '') ? json_decode($data->statics_tag, true) : [];?>
                <ul>
                    <?php $__currentLoopData = $statics_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(URL::route('site.pageTag', ['id'=>$key])); ?>"><?php echo e($item); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

   <?php if(isset($dataTags)): ?>
        <div class="list-key mgb">
            <ul>
                <?php $__currentLoopData = $dataTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(URL::route('site.pageTag', ['id'=>$key])); ?>"><?php echo e($tag); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
   <?php endif; ?>

    <?php if(isset($pageDetail) && !empty($pageDetail)): ?>
        <div class="list-key">
            <?php $statics_tag = (isset($pageDetail->statics_tag) && $pageDetail->statics_tag != '') ? json_decode($pageDetail->statics_tag, true) : []; ?>
            <ul>
                <?php $__currentLoopData = $statics_tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e($key); ?>"><?php echo e($item); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>


    <!------------keyword--------------->

    <div class="Contact-form">
        <h2><?php echo isset($text_lien_he_voi_chung_toi) ? strip_tags($text_lien_he_voi_chung_toi) : ''; ?></h2>
        <form class="iForm" action="<?php echo e(URL::route('site.pageContactPost')); ?>" method="POST">
            <div class="form-group">
                <input type="text" name="contact_name" class="form-control" id="name" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="contact_phone" class="form-control" id="phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input type="text" name="contact_email" class="form-control" id="email" placeholder="Email">
                <i class="fa fa-envelope-o icon-mail" aria-hidden="true"></i>

            </div>
            <div class="form-group">
                <textarea cols="30" rows="2" name="contact_content" id="contentBox"  class="form-control" placeholder="Ghi chú"></textarea>
            </div>
            <div class="btn-click">
                <button class="btn btn-primary btnBox" type="submit">Gửi ngay</button>
            </div>
            <?php echo csrf_field(); ?>

        </form>
    </div>
</div>
<?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/block/left.blade.php ENDPATH**/ ?>