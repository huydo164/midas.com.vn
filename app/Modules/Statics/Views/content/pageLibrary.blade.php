<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

@extends('Statics::layout.html')
@section('header')
    @include('Statics::block.header')
@stop
@section('footer')
    @include('Statics::block.footer')
@stop
@section('content')
    <div class="thumb-header">
        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/banner01.jpg" alt="">
    </div>
    <div id="pd-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('Statics::block.left')
                </div>
                <div class="col-lg-9">
                    <div class="commitment">
                        <h3>
                            <b></b>
                            <span>Thư viện ảnh</span>
                            <b></b>
                        </h3>
                    </div>
                    <div class="dich-vu">
                        <h4>Các công trình đã thực viện</h4>
                        <p class="tt-service">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                        <div class="carousel-wrap">
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                                <div class="item">
                                    <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                </div>
                            </div>
                        </div>
                        <div class="item-product">
                            <h4>Các công trình đã thực viện</h4>
                            <p class="tt-service">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                            <div class="carousel-wrap">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-product">
                            <h4>Các công trình đã thực viện</h4>
                            <p class="tt-service">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </p>
                            <div class="carousel-wrap">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                    <div class="item">
                                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---------row---------->
        </div>
    </div>
@stop
