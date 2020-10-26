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

<div class="slide-web">
    <div class="carousel-wrap">
        <div class="carousel" data-flickity='{  "lazyLoad": true , "prevNextButtons": false , "pageDots" : false}'>

            @foreach($dataBannerHeader as $item)
                <div class="carousel-cell">
                    <img class="carousel-cell-image"
                         data-flickity-lazyload="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_BANNER, $item['banner_id'],$item['banner_image'], 1600,0, '', true, true, false) }}" />
                </div>

            @endforeach
        </div>
    </div>
</div>
<div class="service">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{!! isset($name_cat_dich_vu['info_intro']) ? $name_cat_dich_vu['info_intro'] : '' !!}</span>
                <b></b>
            </h3>
            <div class="row">
                @if(isset($data_cat_dich_vu) && !empty($data_cat_dich_vu))
                @foreach ($data_cat_dich_vu as $item)
                <div class="col-md-4">
                    <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true, false) }}" />
                    <h3 class="chunho">
                        <b></b>
                        <span>{{ $item->statics_title }}</span>
                        <b></b>
                    </h3>
                </div>
                @endforeach
                @endif


            </div>
        </div>
    </div>
</div>
<div class="commitment">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ isset($name_cat_commitment->info_intro) ? $name_cat_commitment->info_intro : '' }}</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            @if(isset($data_commitment) && !empty($data_commitment))
            @foreach ($data_commitment as $item)
            <div class="col-md-6">
                <a href="{{FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)}}">
                    <div class="box-img">
                        <div class="box-img-1">
                            <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                        </div>
                    </div>

                    <div class="box-text">
                        <h5>{{ $item->statics_title }}</h5>
                        <p>{{ strip_tags($item->statics_content) }}</p>
                        <button>XEM THÊM</button>
                    </div>
                </a>
            </div>
            @endforeach
            @endif


        </div>
    </div>
</div>
@if(isset($hightlight) && sizeof($hightlight) > 0 )
<div class="highlights">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ isset($name_cat_hightlight->info_intro) ? $name_cat_hightlight->info_intro : '' }}</span>
                <b></b>
            </h3>
        </div>
        <div class="carousel-wrap">
            <div class="carousel"
                 data-flickity='{ "lazyLoad": true , "groupCells": 5 , "pageDots": false}'>
                @foreach($hightlight as $item)
                    <div class="carousel-cell">
                        <a href="{{FuncLib::buildLinkProduct($item->product_id, $item->product_title)}}">
                            <img class="carousel-cell-image" alt="walrus"
                                 data-flickity-lazyload-src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item->product_id,$item->product_image, 0,0, '', true, true, false) }}"
                                 data-flickity-lazyload-srcset="
                                        {{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item->product_id,$item->product_image, 0,0, '', true, true, false) }} 520w,
                                        {{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item->product_id,$item->product_image, 0,0, '', true, true, false) }} 360w"
                                 sizes="(min-width: 1024px) 520px, 360px"
                            />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<div class="collection">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ isset($name_cat_collection->info_intro) ? $name_cat_collection->info_intro : ''}}</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                        @foreach($data_collection as $key => $item)
                            @if($key< 1)
                                    <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                            @endif
                        @endforeach
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right">
                    <div class="row">
                        @foreach($data_collection as $key => $item)
                        @if($key >= 1)
                        <div class="col-md-6">
                            <a data-fancybox="gallery" href="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" data-caption="Caption for single image">
                                <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                            </a>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.collection a').fancybox();
            });
        </script>
    </div>

</div>

<div class="finish highlights">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ isset($name_cat_finish->info_intro) ? $name_cat_finish->info_intro : '' }}</span>
                <b></b>
            </h3>
        </div>
        <div class="carousel-wrap">
            <div class="carousel" data-flickity='{ "fullscreen": true, "lazyLoad": 2 , "contain" : true}'>
                @foreach($data_finish as $key => $item)
                    <div class="carousel-cell">
                        <a href="{{FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)}}">
                            <img data-flickity-lazyload="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<div class="testimonials">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ isset($name_cat_testimonials->info_intro) ? $name_cat_testimonials->info_intro : '' }}</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            @foreach($data_testimonials as $key => $item)
            <div class="col-md-4">
                <div class="anh">
                    <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                </div>

                <div class="quote">
                    <i class="fa fa-quote-right"></i>
                    <p class="quote-content">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ ...</p>
                    <p class="name">Nguyễn văn An</p>
                </div>
            </div>
            @endforeach

        </div>
        <a href="{{ URL::Route('site.PageCustomer') }}" class="showmore">
            <span>XEM THÊM</span>
        </a>
    </div>

</div>
<div class="introduce">
    <div class="container">
        @foreach($data_aboutme as $item)
        <div class="row">

            <div class="col-md-6">
                <div class="anh">
                    <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-me">
                    <h5>{{ $item->statics_title }}</h5>
                    <p>{!! strip_tags($item->statics_content) !!}</p>
                    <a href="{{FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)}}"><button >XEM NGAY</button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop