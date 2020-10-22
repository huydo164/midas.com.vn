<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\ThumbImg;
?>
<div class="header">
    <div class="bg-close"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="logo">
                    @if(isset($arrTextLogo) && !empty($arrTextLogo))
                        <a href="{{ FuncLib::getBaseURL() }}">
                            <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrTextLogo->info_id, $arrTextLogo->info_img, 800,0, '', true, true) }}" />
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="menu-top">
                    <div class="navigation">
                        <span class="navigationIcon">
                            <span class="line top"></span>
                            <span class="line mid"></span>
                            <span class="line bot"></span>
                        </span>
                        <ul class="menu-parent" id="menuList">
                            @if(isset($arrCategory) && !empty($arrCategory))
                                @foreach($arrCategory as $cat)
                                    @if($cat->category_menu == CGlobal::status_show && $cat->category_parent_id == 0)
                                        <?php $i=0 ?>
                                        @foreach($arrCategory as $sub)
                                            @if($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id)
                                                <?php $i++; ?>
                                            @endif
                                        @endforeach
                                        <li>
                                            <a @if($i > 0) @endif title="{{$cat->category_title}}" href="@if($cat->category_link_replace != ''){{$cat->category_link_replace}}@else{{FuncLib::buildLinkCategory($cat->category_id, $cat->category_title)}}@endif" >
                                                {{$cat->category_title}}
                                                @if($i>0) <i class="fas fa-angle-down"></i> @endif
                                            </a>
                                            @if($i > 0)
                                                <ul class="menu-sub">

                                                    @foreach($arrCategory as $sub)
                                                        @if($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id &&  $cat->category_id == 681)
                                                            <li>
                                                                <a title="{{$sub->category_title}}" href="@if($sub->category_link_replace != ''){{$sub->category_link_replace}}@else{{FuncLib::buildLinkDetailProduct($sub->category_id, $sub->category_title)}}@endif">
                                                                    {{stripcslashes($sub->category_title)}}
                                                                </a>
                                                            </li>
                                                        @elseif($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id)
                                                            <li>
                                                                <a title="{{$sub->category_title}}" href="@if($sub->category_link_replace != ''){{$sub->category_link_replace}}@else{{FuncLib::buildLinkDetailStatic($sub->category_id, $sub->category_title)}}@endif">{{stripcslashes($sub->category_title)}}
                                                                </a>

                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>