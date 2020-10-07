<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

<div id="left-page">
    <div class="service-menu">
        <div class="list-service">
            <ul>
                <li><a href="">Mạ vàng nhà</a></li>
                <li><a href="">Mạ vàng đồng hồ</a></li>
                <li><a href="">Mạ vàng đình chùa</a></li>
                <li><a href="">Mạ vàng oto</a></li>
                <li><a href="">Các dự án thực hiện</a></li>
            </ul>
        </div>
    </div>

    <!----------service----------->

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

    <!------------keyword--------------->

    <div class="Contact-form">
        <h2>Liên hệ với chúng tôi</h2>
        <form class="iForm" action="" method="POST">
            <div class="form-group">
                <input type="text" name="" class="form-control" id="name" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="" class="form-control" id="phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input type="email" name="" class="form-control" id="email" placeholder="Email">
                <i class="fa fa-envelope-o icon-mail" aria-hidden="true"></i>

            </div>
            <div class="form-group">
                <textarea cols="30" rows="2" name="" id="contentBox"  class="form-control" placeholder="Ghi chú"></textarea>
            </div>
            <div class="btn-click">
                <button class="btn btn-primary btnBox" type="button">Gửi ngay</button>
                {!! csrf_field() !!}
            </div>
        </form>
    </div>
</div>
