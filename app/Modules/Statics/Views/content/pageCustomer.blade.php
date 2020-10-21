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
    <div class="customer">
        <div class="container">
            <div class="title">
                <h3>
                    <b></b>
                    <span>{{ $name_cat_testimonials->info_intro }}</span>
                    <b></b>
                </h3>
            </div>
            <div class="row">
                @foreach($data_testimonials as $key => $item)
                <div class="col-md-6">
                    <div class="testi-wrapper">
                        <div class="testi-details">
                            <div class="clinet-img #SHOW_IMG">
                                <a>
                                    <img title="Nguyễn văn An" src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" alt="">
                                </a>
                            </div>
                            <div class="testi-text">
                                <div class="row">
                                    <span class="testi-name">Nguyễn văn An</span>

                                </div>

                                <div class="row">
                                    <span class="stars">
                                        <div class="wrapperStars_fe">
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="selected_star"></div>
                                            <div class="clear">

                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="quotes ">
                            <div class="quote-content">
                                <a></a><p><a>Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm&nbsp;mạ vàng&nbsp;sau đây đã và đang gây sốt trong cộng đồng những người đam mê sự khác biệt và thích những món h...</a>
                                </p></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
