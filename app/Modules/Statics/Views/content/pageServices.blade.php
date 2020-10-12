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
                        @if(isset($data) && !empty($data))
                            <h4>{{ $data->statics_title }}</h4>
                            {!! stripslashes($data->statics_content) !!}
                        @endif
                    </div>
                    <div class=" bg-none">
                        @if(isset($arrSame) && !empty($arrSame))
                            <ul>
                                @foreach($arrSame as $item)
                                    @if($item->category_id != 703)
                                        <li><a href="{{ FuncLib::buildLinkDetailStatic($item->category_id, $item->category_title) }}">{{ $item->category_title }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <!---------row---------->

            <div class="commitment">
                <h3>
                    <b></b>
                    <span>{!! isset($text_san_pham_noi_bat) ? strip_tags($text_san_pham_noi_bat) : '' !!}</span>
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
