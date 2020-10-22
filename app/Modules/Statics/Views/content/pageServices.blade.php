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
    <div id="page-service">
        <div id="pd-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        @include('Statics::block.left')
                    </div>
                    <div class="col-lg-9 col-md-9">

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
                <div class="carousel-wrap slide-service">
                    <div class="carousel" data-flickity='{  "lazyLoad": true , "prevNextButtons": false, "groupCells": true, "freeScroll": true, "wrapAround": true, "pageDots" : false}'>

                        @if( isset($data_product) && !empty($data_product))
                            @foreach($data_product as $item)
                                    <div class="carousel-cell">
                                        <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item->product_id, $item->product_image, 800, 0, '', true, true) }}" />
                                    </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
