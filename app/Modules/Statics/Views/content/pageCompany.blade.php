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
                            <span>Giới thiệu về công ty</span>
                            <b></b>
                        </h3>
                    </div>
                    <div class="dich-vu">
                        <p class="tt-service">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                        </p>
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/ma-vang-nha.jpg" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                    <div class="linkPage">
                        <ul>
                            <li><a href="">Mạ vàng nhà.</a></li>
                            <li><a href="">Mạ vàng đồng hồ.</a></li>
                            <li><a href="">Mạ vàng đình chùa</a></li>
                            <li><a href="">Mạ vàng oto.</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!---------row---------->
        </div>
    </div>
@stop
