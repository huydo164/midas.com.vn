<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\ThumbImg;
?>
<div class="footer">
    <div class="footer-top">
        <div class="container">
            <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_INFO, $arrTextLogo->info_id, $arrTextLogo->info_img, 800, 0, '', true, true) }}"/>
            <h6>{!! isset($arrTextLogo->info_content) ? $arrTextLogo->info_content : '' !!}</h6>
            <p>{!! isset($text1->info_content) ? $text1->info_content : '' !!}: <span>{!! isset($text_sdt->info_content) ? $text_sdt->info_content : ''  !!}</span> </p>
            <p>{!! isset($text_add->info_content) ? $text_add->info_content : ''  !!}</p>
            <p> <i class="far fa-envelope"></i> {!! isset($text_mail->info_content) ? $text_mail->info_content : ''  !!}</p>
        </div>
    </div>
    <div class="footer-mid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>{{ isset($name_cat_support->info_intro ) ? $name_cat_support->info_intro  : '' }}</h2>
                    <div class="gach"></div>
                    <ul>
                        @if(isset($data_support) && !empty($data_support))
                            @foreach ($data_support as $item)
                        <li>
                            <a href="{{FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)}}">{{ $item->statics_title }}</a>
                        </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-4">
                <h2>{{ isset($name_cat_chinhsach->info_intro ) ? $name_cat_chinhsach->info_intro  : '' }}</h2>
                    <div class="gach"></div>
                    <ul>
                        @if(isset($data_chinhsach) && !empty($data_chinhsach))
                            @foreach ($data_chinhsach as $item)
                                <li>
                                    <a href="{{FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title)}}">{{ $item->statics_title }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-4">
                <h2>{{ isset($name_cat_hotline->info_intro ) ? $name_cat_hotline->info_intro  : '' }}</h2>
                    <div class="gach"></div>
                    <ul>
                        @if(isset($data_hotline) && !empty($data_hotline))
                            @foreach ($data_hotline as $item)
                        <li>
                            <a href="#">{{ $item->statics_title }}</a>
                        </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bot">
        <div class="container">
            <p>{!! isset($text_bot->info_content ) ? $text_bot->info_content  : '' !!}</p>
        </div>
    </div>
    <div class="scroll-top">
        <button class="btnTop"><i class="fas fa-chevron-up"></i></button>
    </div>
</div>

