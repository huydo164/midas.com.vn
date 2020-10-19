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

</div>
<div class="service">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ $name_cat_dich_vu->info_intro }}</span>
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
                <span>{{ $name_cat_commitment->info_intro }}</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            @if(isset($data_commitment) && !empty($data_commitment))
                @foreach ($data_commitment as $item)
                <div class="col-md-6">
                    <a href="#">
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
<div class="highlights">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>CÁC DỊCH VỤ CỦA CHÚNG TÔI</span>
                <b></b>
            </h3>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=1" />
                    <span class="img-text">nightlife</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=2" />
                    <span class="img-text">abstract</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=3" />
                    <span class="img-text">animals</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=4" />
                    <span class="img-text">nature</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=5" />
                    <span class="img-text">business</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=6" />
                    <span class="img-text">cats</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=7" />
                    <span class="img-text">city</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=8" />
                    <span class="img-text">food</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=9" />
                    <span class="img-text">fashion</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=10" />
                    <span class="img-text">people</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=11" />
                    <span class="img-text">sports</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=12" />
                    <span class="img-text">technics</span>
                </div>
                <div class="item">
                    <img src="https://picsum.photos/640/480?pic=13" />
                    <span class="img-text">transport</span>
                </div>
            </div>
        </div>
        <script>
            $('.owl-carousel').owlCarousel({
                margin: 10,
                nav: true,
                navText: ["<div class='nav-btn prev-slide'> </div>", "<div class='nav-btn next-slide'> </div>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        </script>



    </div>
</div>
<div class="collection">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>{{ $name_cat_collection->info_intro}}</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                        @foreach($data_collection as $key => $item)
                            @if($key < 1)
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
                                    <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
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
                <span>{{ $name_cat_finish->info_intro }}</span>
                <b></b>
            </h3>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel owl-theme">
                @foreach($data_finish as $key => $item)
                        <div class="item">
                            <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                        </div>
                @endforeach
                
            </div>
        </div>
        <script>
            $('.owl-carousel').owlCarousel({
                margin: 10,
                nav: true,
                navText: ["<div class='nav-btn prev-slide'> </div>", "<div class='nav-btn next-slide'> </div>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        </script>
    </div>
</div>
<div id="content">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if(isset($dataBannerHeader) && !empty($dataBannerHeader))
                @foreach($dataBannerHeader as $item)
                    @if ($item > 2)
                        <div class="carousel-item active">
                            <img src="{{ThumbImg::thumbBaseNormal(CGlobal::FOLDER_BANNER, $item['banner_id'], $item['banner_image'], 2000, 0, '', true, true, false)}}" alt="">
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

    </div>
</div>
<div class="testimonials">
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
        <a href="#" class="showmore">
            <span>XEM THÊM</span>
        </a>
    </div>

</div>
<div class="introduce">
    <div class="container">
        @foreach($data_aboutme as $item):
        <div class="row">
        
            <div class="col-md-6">
                <div class="anh">
                    <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 800,0, '', true, true) }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-me">
                    <h5>{{ $item->statics_title }}</h5>
                    <p>{{ strip_tags($item->statics_content) }}</p>
                    <button>XEM NGAY</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop