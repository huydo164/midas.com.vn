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
            <div class="page-library">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        @include('Statics::block.left')
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="commitment">
                            <h3>
                                <b></b>
                                <span>Thư viện ảnh</span>
                                <b></b>
                            </h3>
                        </div>
                        <div class="dich-vu">
                            @if(isset($data_thu_vien) && !empty($data_thu_vien))
                                @foreach($data_thu_vien as $key => $item)
                                    <h4>{!! $item->statics_title !!}</h4>
                                    <p class="tt-service">
                                        {!! $item->statics_content !!}
                                    </p>
                                    <?php
                                        $statics_image_other = ($item->statics_image_other != '') ? unserialize($item->statics_image_other) : [] ;
                                    ?>
                                    <div class="carousel-wrap slide-library">
                                        <div class="carousel" data-flickity='{  "lazyLoad": true , "prevNextButtons": false, "groupCells": true, "freeScroll": true, "wrapAround": true, "pageDots" : false}'>

                                            @if( !empty($statics_image_other))
                                                @foreach($statics_image_other as $img)
                                                    @if($img != '')
                                                        <div class="carousel-cell">
                                                            <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $img, 800, 0, '', true, true) }}" />
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!---------row---------->
        </div>
    </div>
@stop
