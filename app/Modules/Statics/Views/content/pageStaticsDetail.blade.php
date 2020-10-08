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
                <h2>{!! isset($text_dich_vu)  ? strip_tags($text_dich_vu) : '' !!} </h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('Statics::block.left')
                </div>
                <div class="col-lg-9">
                    <div class="dich-vu">
                        <h4>{{ $data->statics_title }}</h4>
                        <div class="tt-service">
                            {!! stripslashes($data->statics_content) !!}
                        </div>
                    </div>
                    <div class="blog-share">
                        <div class="divider"></div>
                        <div class="social-icon">
                            <a href="" class=" btn-face box"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class=" btn-twit box"><i class="fab fa-twitter"></i></a>
                            <a href="" class=" btn-envelop box"><i class="far fa-envelope"></i></a>
                            <a href="" class=" btn-print box"><i class="fab fa-pinterest"></i></a>
                            <a href="" class=" btn-gg box"><i class="fab fa-google-plus-g"></i></a>
                            <a href="" class=" btn-link box"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!---------row---------->
        </div>
    </div>
@stop
