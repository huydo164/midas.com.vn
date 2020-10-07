<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

@extends('Statics::layout.html')
@section('content')
    <div class="thumb-header">
        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/banner01.jpg" alt="">
    </div>
    <div id="service-page">
        <div class="container">
            <div class="info-service">
                <h2>Dịch vụ</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('Statics::block.left')
                </div>
                <div class="col-lg-9">
                    <div class="dich-vu">
                        <h4>Dịch vụ mạ vàng nhà</h4>
                        <p class="tt-service">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/ma-vang-nha.jpg" alt="">
                        <h4 style="text-align: center;  margin-top: 20px">Sản phẩm mạ vàng nhà</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <span><img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/11-350x240.jpg" alt=""></span>
                        <span><img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/01-350x240.jpg" alt=""></span>
                        <span><img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" alt=""></span>
                        <h4 style="text-align: center; margin-top: 20px">Sản phẩm mạ vàng nhà</h4>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <div class="click-link">
                            <ul>
                                <li><a href="">Các công trình mạ vàng đồng hồ</a></li>
                                <li><a href="">Các công trình mạ vàng đình chùa</a></li>
                                <li><a href="">Các công trình mạ vàng oto</a></li>
                            </ul>
                        </div>
                        <div class="service-hot">
                            <h3>
                                <b></b>
                                <span>Sản phẩm nổi bật</span>
                                <b></b>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
