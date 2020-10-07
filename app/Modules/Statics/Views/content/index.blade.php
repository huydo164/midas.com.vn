<?php

use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
?>
@extends('Statics::layout.html')
@section('content')
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
@stop