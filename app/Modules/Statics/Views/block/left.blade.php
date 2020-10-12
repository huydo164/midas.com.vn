<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

<div id="left-page">
    <div class="service-menu">
        <div class="list-service">
            @if(isset($arrCategory) && !empty($arrCategory))
                @foreach($arrCategory as $cat)

                        @if($cat->category_id == 680)
                            <ul class="menu-sub">
                                @foreach($arrCategory as $sub)
                                    @if( $sub->category_parent_id == $cat->category_id)
                                        <li>
                                            <a title="{{$sub->category_title}}" href="@if($sub->category_link_replace != ''){{$sub->category_link_replace}}@else{{FuncLib::buildLinkDetailStatic($sub->category_id, $sub->category_title)}}@endif">
                                                {{stripcslashes($sub->category_title)}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                @endforeach
            @endif
        </div>
    </div>

    <div class="search-box">
        @if(isset($dataCate->category_id) && !empty($dataCate->category_id))
            @if($dataCate->category_id > 0 )
                <form action="{{ URL::route('site.pageSearch') }}" method="GET" id="formSearch">
                    <input type="text" class="form-control" name="statics_title" autocomplete="off" id="inputBox" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-primary btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            @endif
        @elseif(isset($dataCate->statics_id) && !empty($dataCate->statics_id))
            @if($dataCate->statics_id > 0)
                <form action="{{ URL::route('site.pageSearch') }}" method="GET" id="formSearch">
                    <input type="text" class="form-control" name="statics_title" autocomplete="off" id="inputBox" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-primary btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            @endif
        @endif
    </div>

    <!----------service----------->

    <div class="keyword">
        <h2>{!! isset($text_tu_khoa) ? strip_tags($text_tu_khoa) : '' !!}</h2>
        <div class="list-key">
            @if(isset($arrCategory) && !empty($arrCategory))
                @foreach($arrCategory as $item)
                    @if($item->category_id == 680)
                        <ul>
                            <li><a href="">Tượng</a></li>
                            <li><a href="">Vàng</a></li>
                            <li><a href="">Mạ vàng</a></li>
                            <li><a href="">Vật phẩm</a></li>
                            <li><a href="">Kích thước</a></li>
                            <li><a href="">Video</a></li>
                            <li><a href="">Tin dùng</a></li>
                            <li><a href="">Giá tiền</a></li>
                        </ul>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

    <!------------keyword--------------->

    <div class="Contact-form">
        <h2>{!! isset($text_lien_he_voi_chung_toi) ? strip_tags($text_lien_he_voi_chung_toi) : '' !!}</h2>
        <form class="iForm" action="" method="POST">
            <div class="form-group">
                <input type="text" name="" class="form-control" id="name" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="" class="form-control" id="phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input type="email" name="" class="form-control" id="email" placeholder="Email">
                <i class="fa fa-envelope-o icon-mail" aria-hidden="true"></i>

            </div>
            <div class="form-group">
                <textarea cols="30" rows="2" name="" id="contentBox"  class="form-control" placeholder="Ghi chú"></textarea>
            </div>
            <div class="btn-click">
                <button class="btn btn-primary btnBox" type="button">Gửi ngay</button>
                {!! csrf_field() !!}
            </div>
        </form>
    </div>
</div>
