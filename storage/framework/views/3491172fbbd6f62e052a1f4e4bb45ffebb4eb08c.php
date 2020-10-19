<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\ThumbImg;
use App\Library\PHPDev\FuncLib;
?>

<?php $__env->startSection('header'); ?>
<?php echo $__env->make('Admin::block.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('left'); ?>
<?php echo $__env->make('Admin::block.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo e(URL::route('admin.dashboard')); ?>">Trang chủ</a>
                </li>
                <li class="active"><?php if($id==0): ?>Thêm mới <?php else: ?> Sửa <?php endif; ?> bài viết tĩnh</li>
            </ul>
        </div>
        <div class="page-content">
            <div class="col-xs-12">
                <div class="row">
                    <?php if(isset($error) && $error != ''): ?>
                    <div class="alert-admin alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form class="form-horizontal paddingTop30" name="txtForm" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 mb-12">
                                <div class="nav-tabs-horizontal nav-tabs-inverse" data-plugin="tabs">
                                    <ul class="nav nav-tabs nav-tabs-solid" role="tablist">
                                        <li class="nav-item active" role="presentation">
                                            <a class="nav-link active" data-toggle="tab" href="#tabNoiDung" aria-controls="tabNoiDung" role="tab">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                Nội dung
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-10">
                                        <div class="tab-pane panelDetail active" id="tabNoiDung" role="tabpanel">
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Mã đơn hàng<span>*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="form-control input-sm" name="orders_title" value="<?php if(isset($data['orders_code'])): ?><?php echo e($data['orders_code']); ?><?php endif; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Tên khách hàng<span>*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="form-control input-sm" name="customer_name" value="<?php if(isset($data['customer_name'])): ?><?php echo e($data['customer_name']); ?><?php endif; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Địa chỉ khách hàng<span>*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="form-control input-sm" name="customer_address" value="<?php if(isset($data['customer_address'])): ?><?php echo e($data['customer_address']); ?><?php endif; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Số điện thoại<span>*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="form-control input-sm" name="customer_phone" value="<?php if(isset($data['customer_phone'])): ?><?php echo e($data['customer_phone']); ?><?php endif; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Email<span>*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="form-control input-sm" name="customer_phone" value="<?php if(isset($data['customer_email'])): ?><?php echo e($data['customer_email']); ?><?php endif; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Tổng số tiền<span>*</span></label>
                                                            <div class="controls">
                                                                <input type="text" class="form-control input-sm" name="orders_price" value="<?php if(isset($data['orders_price'])): ?><?php echo e($data['orders_price']); ?><?php endif; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Trạng thái đơn hàng<span></span></label>
                                                            <div class="controls">
                                                                <select name="orders_status" id="cars">
                                                                    <option value="0" <?php if($data['orders_status'] == 0): ?>  selected="selected" <?php endif; ?>>Chờ xác nhận</option>
                                                                    <option value="1" <?php if($data['orders_status'] == 1): ?>  selected="selected" <?php endif; ?>>Chờ giao hàng</option>
                                                                    <option value="2" <?php if($data['orders_status'] == 2): ?>  selected="selected" <?php endif; ?>>Đang giao hàng</option>
                                                                    <option value="3" <?php if($data['orders_status'] == 3): ?>  selected="selected" <?php endif; ?>>Đã giao hàng</option>
                                                                    <option value="4" <?php if($data['orders_status'] == 4): ?>  selected="selected" <?php endif; ?>>Đã hủy</option>
                                                                    <option value="5" <?php if($data['orders_status'] == 5): ?>  selected="selected" <?php endif; ?>>Đã nhận hoàn</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Chi tiết đơn hàng<span></span></label>
                                                            <?php if($data['orders_status'] > 2): ?>
                                                            <div class="controls">
                                                                <select name="cars" id="cars">
                                                                    <option value="0">Chờ xác nhận</option>
                                                                    <option value="1">Chờ giao hàng</option>
                                                                    <option value="2">Đang giao hàng</option>
                                                                    <option value="3">Đã giao hàng</option>
                                                                    <option value="4">Đã hủy</option>
                                                                    <option value="5">Đã nhận hoàn</option>
                                                                </select>
                                                                <input type="number" />
                                                                <input type="submit" value="Thêm sản phẩm" />
                                                            </div>
                                                            <?php endif; ?>
                                                            <table class="table table-bordered table-hover">
                                                                <?php
                                                                $details = unserialize($data['orders_detail']);

                                                                ?>
                                                                <thead class="thin-border-bottom">

                                                                    <tr>
                                                                        <th width="2%">STT</th>
                                                                        <th width="10%">ID sản phẩm</th>
                                                                        <th width="10%">Tên sản phẩm</th>
                                                                        <th width="8%">Số lượng</th>
                                                                        <th width="6%">Giá</th>
                                                                        <th width="6%">Thành tiền</th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody>
                                                                    <?php if(isset($details) && $details !=''): ?>
                                                                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><?php echo e($item['title']); ?></td>
                                                                            <td><?php echo e($item['id']); ?></td>
                                                                            <td> <input type="number" name = number_<?php echo e($item['id']); ?> value="<?php echo e($item['num']); ?>"></td>
                                                                            <td><?php echo e(FuncLib::numberFormat( $item['price'] )); ?></td>
                                                                            <td><?php echo e(FuncLib::numberFormat($item['num'] * $item['price'])); ?></td>

                                                                        </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="panel-footer clearfix">
                                        <div class="form-inline float-right">
                                            <div class="form-row">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" id="id_hiden" name="id_hiden" value="<?php echo e($id); ?>" />
                                                <button type="submit" name="txtSubmit" id="buttonSubmit" class="btn btn-primary btn-sm">Lưu lại</button>
                                                <button type="reset" class="btn btn-sm">Bỏ qua</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\midas.com.vn\app\Modules/Admin/Views/orders/add.blade.php ENDPATH**/ ?>