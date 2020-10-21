<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>

<div id="left-page">
    @if(isset($objData) && !empty($objData) && $objData  > 0 || isset($arrData->category_id) && !empty($arrData->category_id) && $arrData->category_id > 0)
        <h4><i class="fas fa-bars"></i> {{ isset($text_danh_muc_san_pham) ? strip_tags($text_danh_muc_san_pham) : ''}}</h4>
        <div class="list-service">
            <ul>
                @if(isset($arrCategory) && !empty($arrCategory))
                    @foreach($arrCategory as $cat)

                        @if($cat->category_id == $cat_dmsp)
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
    @endif
    <div class="info-service">
        @if(isset($arrCategory) && !empty($arrCategory))

           <h2>
               @foreach($arrCategory as $cat)
                   @if($cat->category_id == 680 && isset($cat->category_id))
                       {!! isset($text_dich_vu) ? strip_tags($text_dich_vu) : '' !!}
                   @elseif($cat->category_id == 682)
                       {!! isset($text_dvct) ? strip_tags($text_dvct) : '' !!}
                   @endif
               @endforeach
           </h2>

        @endif
    </div>
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

    @if(isset($data) && !empty($data))
        <div class="keyword">
            <h2>{!! isset($text_tu_khoa) ? strip_tags($text_tu_khoa) : '' !!}</h2>
            <div class="list-key">
                <?php $statics_tag = (isset($data->statics_tag) && $data->statics_tag != '') ? json_decode($data->statics_tag, true) : []; ?>
                <ul>
                    @foreach($statics_tag as $key => $item)
                        <li><a href="{{$key}}">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

   @if(isset($dataTags))
        <div class="list-key mgb">
            <ul>
                @foreach($dataTags as $key => $tag)
                    <li><a href="{{$key}}">{{$tag}}</a></li>
                @endforeach
            </ul>
        </div>
   @endif

    @if(isset($pageDetail) && !empty($pageDetail))
        <div class="list-key">
            <?php $statics_tag = (isset($pageDetail->statics_tag) && $pageDetail->statics_tag != '') ? json_decode($pageDetail->statics_tag, true) : []; ?>
            <ul>
                @foreach($statics_tag as $key => $item)
                    <li><a href="{{$key}}">{{ $item }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif


    <!------------keyword--------------->

    <div class="Contact-form">
        <h2>{!! isset($text_lien_he_voi_chung_toi) ? strip_tags($text_lien_he_voi_chung_toi) : '' !!}</h2>
        <form class="iForm" action="{{ URL::route('site.pageContactPost') }}" method="POST">
            <div class="form-group">
                <input type="text" name="contact_name" class="form-control" id="name" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="contact_phone" class="form-control" id="phone" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input type="text" name="contact_email" class="form-control" id="email" placeholder="Email">
                <i class="fa fa-envelope-o icon-mail" aria-hidden="true"></i>

            </div>
            <div class="form-group">
                <textarea cols="30" rows="2" name="contact_content" id="contentBox"  class="form-control" placeholder="Ghi chú"></textarea>
            </div>
            <div class="btn-click">
                <button class="btn btn-primary btnBox" type="submit">Gửi ngay</button>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
</div>
