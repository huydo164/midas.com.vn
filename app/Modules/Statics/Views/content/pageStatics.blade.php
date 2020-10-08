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

        @if(isset($dataBannerPage) && !empty($dataBannerPage))
            @foreach($dataBannerPage as $item)
                <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_BANNER, $item['banner_id'], $item['banner_image'], 2000,0, '', true, true, false) }}" width="100%" alt="">
            @endforeach
        @endif

    </div>
    <div id="pd-page">
        <div class="container">
            <div class="info-service">
                <h2>{!! isset($text_dich_vu) ? strip_tags($text_dich_vu) : '' !!}</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('Statics::block.left')
                </div>
                <div class="col-lg-9">
                    <div class="dich-vu">
                        <h4>{!! $dich_vu_1->info_title !!}</h4>
                        <p class="tt-service">
                            {!! strip_tags($dich_vu_1->info_content) !!}
                        </p>
                        <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $dich_vu_1->info_id, $dich_vu_1->info_img, 800, 0, '', true, true) }}" alt="">
                        <h4 style="text-align: center;  margin-top: 20px">{!! $dich_vu_2->info_title !!}</h4>
                        <p>{!! strip_tags($dich_vu_2->info_content) !!}</p>
                        <span><img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $image_1->info_id, $image_1->info_img, 800, 0, '', true, true) }}" alt=""></span>
                        <span><img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $image_2->info_id, $image_2->info_img, 800, 0, '', true, true) }}" alt=""></span>
                        <span><img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $image_3->info_id, $image_3->info_img, 800, 0, '', true, true) }}" alt=""></span>
                        <h4 style="text-align: center;  margin-top: 20px">{!! $dich_vu_2->info_title !!}</h4>
                        <p>{!! strip_tags($dich_vu_2->info_content) !!}</p>
                        <div class="click-link">
                            <ul>
                                @if(isset($data_cong_trinh) && !empty($data_cong_trinh))
                                    @foreach($data_cong_trinh as $item)
                                        <li><a href="">{{ $item->statics_title }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!---------row---------->

            <div class="commitment">
                <h3>
                    <b></b>
                    <span>Sản phẩm nổi bật</span>
                    <b></b>
                </h3>
            </div>
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">nightlife</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">abstract</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">animals</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">nature</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">business</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">cats</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">city</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">food</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">fashion</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">people</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">sports</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">technics</span>
                    </div>
                    <div class="item">
                        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/06-350x240.jpg" />
                        <span class="img-text">transport</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
