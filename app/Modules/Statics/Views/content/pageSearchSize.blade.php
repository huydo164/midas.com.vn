
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
    <div class="content">
        <div class="container">
            <div class="category-page-title">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{ FuncLib::getBaseURL() }}">Trang chủ</a>
                    </li>
                    <li class="active">
                        <a href="#">Tượng địa danh</a>
                    </li>
                </ul>
            </div>
            <div class="noidung">
                <div class="row">
                    <div class="col-md-3">
                        <div class="left">
                            <div class="menu">
                                <h4><i class="fas fa-bars"></i> DANH MỤC SẢN PHẨM</h4>
                                <div class="list-service">
                                    <ul>
                                        @if(isset($arrCategory) && !empty($arrCategory))
                                            @foreach($arrCategory as $cat)

                                                @if($cat->category_id == 681)
                                                    <ul class="menu-sub">
                                                        @foreach($arrCategory as $sub)
                                                            @if( $sub->category_parent_id == $cat->category_id)
                                                                <li>
                                                                    <a title="{{$sub->category_title}}" href="@if($sub->category_link_replace != ''){{$sub->category_link_replace}}@else{{FuncLib::buildLinkDetailProduct($sub->category_id, $sub->category_title)}}@endif">
                                                                        {{stripcslashes($sub->category_title)}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="search">
                                <form action="">
                                    <div class="input">
                                        <input type="text" placeholder="Tìm kiếm ..." />
                                    </div>
                                    <div class="icon">
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>

                                    </div>
                                </form>
                            </div>
                            <div class="price">

                                <form action="" method="get">
                                    {{ csrf_field() }}
                                    <div id="slider-range"></div>
                                    <p>
                                        <button type="submit">Lọc</button>
                                        <input type="text" id="amount" readonly style="border:0; color:white; font-weight:bold;">
                                        <input type="hidden" name="min" id="price_min" value="4200000" />
                                        <input type="hidden" name="max" id="price_max" value="7600000" />
                                    </p>
                                </form>

                                <script>
                                    $(function() {
                                        $("#slider-range").slider({
                                            range: true,
                                            min: 4200000,
                                            max: 7600000,
                                            values: [4200000, 7600000],
                                            slide: function(event, ui) {
                                                $("#amount").val("Giá : " + ui.values[0] + "₫ - " + ui.values[1] + " ₫ ");
                                                $("#price_min").val(ui.values[0]);
                                                $("#price_max").val(ui.values[1]);
                                            }
                                        });
                                        $("#amount").val("Giá : " + $("#slider-range").slider("values", 0) + " ₫ - " +
                                            $("#slider-range").slider("values", 1) + " ₫");
                                    });
                                </script>
                            </div>
                            <div class="size">
                                <h4><i class="fas fa-bars"></i> LỌC THEO KÍCH THƯỚC</h4>
                                <div class="option">
                                    <ul>
                                        @foreach($size as $item)
                                            <li>
                                                <a href="#">
                                                    <label class="container1">
                                                        <input type="checkbox" class="isize" value="{{ $item->product_size }}" />
                                                        {{ $item->product_size }}
                                                        <span class="checkmark"></span>

                                                    </label>

                                                </a>
                                                <span class="so-luong">
                                            ({{ $item->total }})
                                        </span>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>


                            </div>
                            <div class="color">
                                <h4><i class="fas fa-bars"></i> TÌM KIẾM THEO MÀU SẮC</h4>
                                <div class="color-option">
                                    <ul>
                                        @foreach($color as $item)
                                            <li>
                                                <a href="#">
                                                    <label class="container1">
                                                        <input type="checkbox" />
                                                        {{ $item->product_color }}
                                                        <span class="checkmark"></span>

                                                    </label>

                                                </a>
                                                <span class="so-luong">
                                            ({{ $item->total }})
                                        </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <div class="news">
                                <h4><i class="fas fa-bars"></i> TIN TỨC</h4>
                                <ul>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-md-8">

                                                <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                                </a>

                                                <p class="time">
                                                    3 Tháng Tư , 2018
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-md-8">

                                                <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                                </a>

                                                <p class="time">
                                                    3 Tháng Tư , 2018
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-md-8">

                                                <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                                </a>

                                                <p class="time">
                                                    3 Tháng Tư , 2018
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-md-8">

                                                <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                                </a>

                                                <p class="time">
                                                    3 Tháng Tư , 2018
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="#">
                                                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/07-350x240.jpg" />
                                                </a>
                                            </div>
                                            <div class="col-md-8">

                                                <a href="#">
                                                <span class="name">
                                                    Tượng dê vàng
                                                </span>
                                                </a>

                                                <p class="time">
                                                    3 Tháng Tư , 2018
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="fanpage">
                                <h4><i class="fas fa-bars"></i> FANPAGE</h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="right">
                            <p class="gt">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ vàng sau đây đã và đang gây sốt trong cộng đồng những người đam mê sự khác biệt và thích những món hàng xa xỉ.</p>
                            <div class="row">
                                @if(isset($data) && !empty($data))
                                    @foreach($data as $item)
                                        <div class="col-md-4">
                                            <div class="sp">
                                                <div class="img">
                                                    <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item['product_id'], $item['product_image'], 2000,0, '', true, true, false) }}" />
                                                </div>
                                                <div class="nd">
                                                    <a title="{{$item->product_title}}" href="{{FuncLib::buildLinkProduct($item->product_id, $item->product_title)}}">
                                                        <p class="name">{{ stripslashes($item->product_title) }}</p>
                                                    </a>
                                                    <p class="price">{{ ($item->product_price) }}₫</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@stop