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
<div class="product-detail">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="slide-img">

                        <div class="container">
                            <!-- Flickity HTML init -->
                            <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                                <?php
                                $product_image_other = ($data->product_image_other != '') ? unserialize($data->product_image_other) : [];
                                ?>
                                @if( !empty($product_image_other))
                                    @foreach($product_image_other as $img)
                                        @if($img != '')
                                                <div class="carousel-cell"><img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $data->product_id,$img, 2000,0, '', true, true, false) }}"/></div>
                                         @endif
                                    @endforeach
                                @endif
                            </div>
                            <div class="carousel carousel-nav"
                                 data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                                @if( !empty($product_image_other))
                                    @foreach($product_image_other as $img)

                                        @if($img != '')
                                            <div class="carousel-cell"><img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $data->product_id,$img, 2000,0, '', true, true, false) }}"/></div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div><!-- /.container -->

                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="detail">
                        <div class="breadcrums">
                            <a href="#">Trang chủ</a>
                            <span>/</span>
                            <a href="@if($data->category_link_replace != ''){{$data->category_link_replace}}@else{{FuncLib::buildLinkDetailProduct($data->category_id, $data->category_title)}}@endif">{{ stripslashes($data->product_title) }}</a>
                        </div>

                        <h1 class="product-title">{{ stripslashes($data->product_title) }}</h1>
                        <div class="product-price">{{ FuncLib::numberFormat($data->product_price) }}₫</div>
                        @if(isset($avg_rate) && $avg_rate != 0)
                        <div class="rating-box">
                            <div class="ratings-1">
                                <?php

                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $avg_rate) {
                                ?>
                                <span class="fa fa-star"></span>
                                <?php
                                    } else {
                                ?>
                                    <span class="fa fa-star-o"></span>
                                <?php
                                }
                                }
                                ?>
                            </div>
                        </div>
                        @endif
                        <form class="cart" action="{{ URL::route('site.pageCart') }}" method="post" >
                            <div class="quantity buttons_added">
                                <span class="md-number">{{ isset($text_sl->info_intro) ? stripslashes($text_sl->info_intro)  : '' }}</span>
                                <input type="button" value="-" class="minus product-detail button is-form">

                                <input type="number" name="product_num"  id="productNum" class="input-text qty text" step="1" min="1" max="9999" name="quantity" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric">
                                <input type="button" value="+" class="plus product-detail button is-form">  </div>
                                <input type="hidden" value ="{{ ($data->product_id) }}" id="product_id" name="product_id" />
                                {{ csrf_field() }}

                            <button type="submit" name="add-to-cart" id="submitBuy" value="199" class="single_add_to_cart_button button alt">Mua ngay</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>



    </div>
    <div class="bottom">
        <div class="container">
            <div class="row bot">
                <div class="col-md-9">
                    <div class="descripton">
                        <div class="tab">
                            <button class="tablinks active" onclick="openCity(event, 'descripton')">Mô tả</button>
                            <button class="tablinks" onclick="openCity(event, 'review')">Đánh giá</button>
                        </div>

                        <!-- Tab content -->
                        <div id="descripton" class="tabcontent" style="display: block;">
                            {!! isset($data->product_content) ? stripslashes($data->product_content) : 'Mô tả đang được cập nhật' !!}
                        </div>

                        <div id="review" class="tabcontent" style="display: none;">
                            @if(!isset($rating))
                            <h3 class="reply-title">
                                Hãy là người đầu tiên nhận xét “tượng mạ vàng bác hồ 01”
                            </h3>
                            @endif
                                @if($check == 0)
                                <div class="rating">
                                    <p>Đánh giá của bạn</p>
                                    <div class="rating-box">
                                        <div class="ratings">
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                        <input type="hidden" name="rating" id="rating-value" value="">

                                    </div>
                                </div>
                                <script>
                                    const stars = document.querySelector(".ratings").children;
                                    const ratingValue = document.querySelector("#rating-value");
                                    let index;

                                    for (let i = 0; i < stars.length; i++) {
                                        stars[i].addEventListener("mouseover", function() {
                                            // console.log(i)
                                            for (let j = 0; j < stars.length; j++) {
                                                stars[j].classList.remove("fa-star");
                                                stars[j].classList.add("fa-star-o");
                                            }
                                            for (let j = 0; j <= i; j++) {
                                                stars[j].classList.remove("fa-star-o");
                                                stars[j].classList.add("fa-star");
                                            }
                                        })
                                        stars[i].addEventListener("click", function() {
                                            ratingValue.value = i + 1;
                                            index = i;
                                        })
                                        stars[i].addEventListener("mouseout", function() {

                                            for (let j = 0; j < stars.length; j++) {
                                                stars[j].classList.remove("fa-star");
                                                stars[j].classList.add("fa-star-o");
                                            }
                                            for (let j = 0; j <= index; j++) {
                                                stars[j].classList.remove("fa-star-o");
                                                stars[j].classList.add("fa-star");
                                            }
                                        })
                                    }
                                </script>
                                <div class="comment">
                                    <label for="comment">{{ isset($text_nxcb->info_intro) ? stripslashes($text_nxcb->info_intro) : '' }}</label>
                                    <textarea  name="rating_comment" id="rating_comment" cols="45" rows="8" aria-required="true"></textarea>
                                </div>
                                <div class="author">
                                    <p class="name">
                                        <label>{{ isset($text_ten->info_intro) ? stripslashes($text_ten->info_intro) : '' }}</label>
                                        <input  name="rating_author" id="rating_author" type="text" />
                                    </p>
                                    <p class="email">
                                        <label for="gmail">{{ isset($text_gmail->info_intro) ? stripslashes($text_gmail->info_intro) : '' }}</label>
                                        <input  name="rating_gmail" id="rating_gmail"  type="text" />
                                    </p>
                                </div>
{{--                                <div class="form-cookie">--}}
{{--                                    <input name="form-cookie" type="checkbox" />--}}
{{--                                    <label for="form-cookie">Lưu tên của tôi, email, và trang web trong trình duyệt này cho lần bình luận kế tiếp của tôi.</label>--}}
{{--                                </div>--}}
                                <div class="form-submit">
                                    <input name="submit" type="submit" id="rating_submit" class="submit" value="Gửi đi">
                                </div>
                                @endif
                                <div class="list-comment">
                                    <h5>{{ isset($text_dsbl->info_intro) ? stripslashes($text_dsbl->info_intro) : '' }}</h5>
                                    <ul>
                                        @if(isset($rating) && sizeof($rating) > 0)
                                            @foreach($rating as $item)
                                                <li>
                                                    <div class="user-comment">
                                                        <p class="user">
                                                            <span class="username">{{ isset($item->rating_name) ? $item->rating_name : '' }}</span>
                                                            <span class="email">{{ isset($item->rating_email) ? $item->rating_email : '' }}</span>
                                                        </p>
                                                        <p class="comment-details">
                                                            {{ isset($item->rating_detail) ? $item->rating_detail : '' }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>

                        </div>

                        <script>
                            function openCity(evt, cityName) {
                                // Declare all variables
                                var i, tabcontent, tablinks;

                                // Get all elements with class="tabcontent" and hide them
                                tabcontent = document.getElementsByClassName("tabcontent");
                                for (i = 0; i < tabcontent.length; i++) {
                                    tabcontent[i].style.display = "none";
                                }

                                // Get all elements with class="tablinks" and remove the class "active"
                                tablinks = document.getElementsByClassName("tablinks");
                                for (i = 0; i < tablinks.length; i++) {
                                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                                }

                                // Show the current tab, and add an "active" class to the button that opened the tab
                                document.getElementById(cityName).style.display = "block";
                                evt.currentTarget.className += " active";
                            }
                        </script>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="news">
                            <h4><i class="fas fa-bars"></i>{{ isset($text_tt->info_intro) ? stripslashes($text_tt->info_intro) : '' }}</h4>
                            <ul>
                                @if(isset($news) && !empty($news))
                                    @foreach($news as $item)
                                        <li>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <a href="#">
                                                        <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 2000,0, '', true, true) }}" />
                                                    </a>
                                                </div>
                                                <div class="col-md-7">

                                                    <a href="#">
                                                        <span class="name">
                                                            {{ $item->statics_title }}
                                                        </span>
                                                    </a>

                                                    <p class="time">
                                                        {{ date("d-m-Y",$item->statics_created) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="lich">
                            <iframe style="padding:0;border:none;overflow:hidden; width: 100%;height:300px" src="//amlich.com/#type=7&amp;bg=2&amp;color=3"></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="similar-product">
        <div class="container">
            <div class="title">
                <h3>
                    <b></b>
                    <span>{{ isset($text_sptt->info_intro) ? stripslashes($text_sptt->info_intro) : '' }}</span>
                    <b></b>
                </h3>
            </div>
            @if(isset($dataSame) && sizeof($dataSame) > 0)
            <div class="carousel-wrap">
                <div class="carousel" data-flickity='{ "fullscreen": true, "lazyLoad": 2 , "pageDots" : false , "contain" : true }'>
                    @foreach($dataSame as $item)
                        <div class="carousel-cell">
                            <a href="{{FuncLib::buildLinkProduct($item->product_id, $item->product_title)}}">
                                <img class="carousel-image" data-flickity-lazyload="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item->product_id,$item->product_image, 0,0, '', true, true, false) }}" width="435px" height="300px" />
                            </a>
                        </div>

                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@stop