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
    <div id="page-project">
        <div id="pd-page">
            <div class="container">
                <div class="title-project txt-center">
                    @if(isset($dataCate->category_id))
                        <h4>{{ $dataCate->category_title }}</h4>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        @include('Statics::block.left')
                    </div>
                    <div class="col-lg-9">
                        <div class="project-done">
                            @if(isset($data_finish) && !empty($data_finish))
                                @foreach($data_finish as $key => $item)
                                    <div class="pro-contro txt-center">
                                        <h4 class=" mg-bot"><a href="{{ FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title) }}" title="{{ $item->statics_title }}">{{ $item->statics_title }}</a></h4>
                                        <div class="date ">
                                            <span class="pr-2">{!! isset($text_post) ? strip_tags($text_post) : '' !!} </span>
                                            <span class="cb pr-2">{{ date('d/m/Y', $item->statics_created) }}</span>
                                            <span class="pr-2">{!! isset($text_by) ? strip_tags($text_by) : '' !!}</span>
                                            <span class="pr-2 cb">ADMIN</span>
                                        </div>
                                        <div class="img-project">
                                            <a href="{{ FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title) }}" title="{{ $item->statics_title }}">
                                                <img src="{{ ThumbImg::thumbBaseNormal(CGlobal::FOLDER_STATICS, $item->statics_id, $item->statics_image, 2000,0, '', true, true) }}", width="100%" alt="">
                                            </a>
                                            <div class="date-box">
                                                <p>{{ date('d', $item->statics_created) }}</p>
                                                <p class="f-s">Th{{ date('m', $item->statics_created) }}</p>
                                            </div>
                                        </div>
                                        <p class="pro-intro">{{ $item->statics_intro }}</p>
                                        <div class="btn-read mb-5">
                                            <a href="{{ FuncLib::buildLinkDetailStatic($item->statics_id, $item->statics_title) }}" title="{{ $item->statics_title }}">{!! isset($text_continue) ? strip_tags($text_continue) : '' !!} -></a>
                                        </div>
                                        <div class="pro-bot">
                                            <div class="float-left">
                                                {!! isset($text_post_in) ? strip_tags($text_post_in) : '' !!}
                                                <span>{{ isset($dataCate->category_id) ? $dataCate->category_title : '' }}</span>
                                                |
                                                {!! isset($text_tagged) ? strip_tags($text_tagged) : '' !!}
                                                @foreach($dataTags as $key => $item)
                                                    <span><a href="{{ FuncLib::buildLinkTag($key, $item) }}" title="{{ $item }}">{{ $item }}</a></span>
                                                @endforeach
                                            </div>
                                            <div class="float-right"><a href="">{{ isset($text_comment) ? strip_tags($text_comment) : '' }}</a></div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                </div>
                <!---------row---------->
            </div>
        </div>
    </div>
@stop
