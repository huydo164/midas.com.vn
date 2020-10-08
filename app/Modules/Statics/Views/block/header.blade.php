<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\ThumbImg;
?>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="http://localhost:8080/midas.com.vn/public/assets/frontend/img/logo.png" />
            </div>
            <div class="col-md-9">
                <ul>
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
                                <a @if($i > 0) @endif title="{{$cat->category_title}}" >
                                    {{$cat->category_title}}
                                </a>
                                @if($i > 0)
                                    <ul class="menu-sub">
                                        @foreach($arrCategory as $sub)
                                            @if($sub->category_menu == CGlobal::status_show && $sub->category_parent_id == $cat->category_id)
                                                <li>
                                                    <a title="{{$sub->category_title}}">
                                                        {{stripcslashes($sub->category_title)}}
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