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


<div class="service">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>CÁC DỊCH VỤ CỦA CHÚNG TÔI</span>
                <b></b>
            </h3>
            <div class="row">
                <div class="col-md-4">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/09-350x240.jpg" />
                    <h3 class="chunho">
                        <b></b>
                        <span>QÙA TẶNG MẠ VÀNG</span>
                        <b></b>
                    </h3>
                </div>
                <div class="col-md-4">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/09-350x240.jpg" />
                    <h3 class="chunho">
                        <b></b>
                        <span>QÙA TẶNG MẠ VÀNG</span>
                        <b></b>
                    </h3>
                </div>
                <div class="col-md-4">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/09-350x240.jpg" />
                    <h3 class="chunho">
                        <b></b>
                        <span>QÙA TẶNG MẠ VÀNG</span>
                        <b></b>
                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="commitment">
    <div class="container">
        <div class="title">
            <h3>
                <b></b>
                <span>CÁC DỊCH VỤ CỦA CHÚNG TÔI</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="#">
                    <div class="box-img">
                        <div class="box-img-1">
                            <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                        </div>
                    </div>

                    <div class="box-text">
                        <h5>Máy móc hiện đại</h5>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, inventore iure. voluptas laborum? Corrupti?</p>
                        <button>XEM THÊM</button>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#">
                    <div class="box-img">
                        <div class="box-img-1">
                            <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                        </div>
                    </div>
                    <div class="box-text">
                        <h5>Máy móc hiện đại</h5>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, inventore iure. voluptas laborum? Corrupti?</p>
                        <button>XEM THÊM</button>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#">
                    <div class="box-img">
                        <div class="box-img-1">
                            <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                        </div>
                    </div>
                    <div class="box-text">
                        <h5>Máy móc hiện đại</h5>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, inventore iure. voluptas laborum? Corrupti?</p>
                        <button>XEM THÊM</button>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#">
                    <div class="box-img">
                        <div class="box-img-1">
                            <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                        </div>
                    </div>
                    <div class="box-text">
                        <h5>Máy móc hiện đại</h5>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, inventore iure. voluptas laborum? Corrupti?</p>
                        <button>XEM THÊM</button>

                    </div>
                </a>
            </div>
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
                <span>BỘ SƯU TẬP CÁC SẢN PHẨM</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                        <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                    </a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="right">
                    <div class="row">
                        <div class="col-md-6">
                            <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a data-fancybox="gallery" href="img/1.png" data-caption="Caption for single image">
                                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/bao-hanh-294x300.png" />
                            </a>
                        </div>
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
                <span>CÁC DỊCH VỤ CỦA CHÚNG TÔI</span>
                <b></b>
            </h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="anh">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/maxresdefault.jpg" />
                </div>

                <div class="quote">
                    <i class="fa fa-quote-right"></i>
                    <p class="quote-content">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ ...</p>
                    <p class="name">Nguyễn văn An</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="anh">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/maxresdefault.jpg" />
                </div>
                <div class="quote">
                    <i class="fa fa-quote-right"></i>
                    <p class="quote-content">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ ...</p>
                    <p class="name">Nguyễn văn An</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="anh">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/maxresdefault.jpg" />
                </div>
                <div class="quote">
                    <i class="fa fa-quote-right"></i>
                    <p class="quote-content">Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ ...</p>
                    <p class="name">Nguyễn văn An</p>
                </div>
            </div>
        </div>
        <a href="#" class="showmore">
            <span>XEM THÊM</span>
        </a>
    </div>

</div>
<div class="introduce">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="anh">
                    <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/du-an-01.png" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-me">
                    <h5>Về chúng tôi</h5>
                    <p>Kim loại quý là thứ mà không bao giờ lỗi mốt và luôn được các nhà thiết kế, chế tác lựa chọn để đưa vào các sản phẩm làm đẹp. Những sản phẩm mạ vàng sau đây đã và đang gây sốt trong cộng đồng những người...</p>
                    <button>XEM NGAY</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop