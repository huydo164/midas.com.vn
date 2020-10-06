<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

<?php $__env->startSection('content'); ?>
<div id="content">
    <section class="slider-area slider">
        <div>
            <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/banner01.jpg" alt="">
        </div>
        <div>
            <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/banner02.jpg" alt="">
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Statics::layout.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\project.vn\midas.com.vn\app\Modules/Statics/Views/content/index.blade.php ENDPATH**/ ?>