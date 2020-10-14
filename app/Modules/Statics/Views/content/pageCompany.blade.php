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
    <div class="thumb-header">
        <img src="http://localhost:8080/project.vn/midas.com.vn/public/assets/frontend/img/banner01.jpg" alt="">
    </div>
    <div id="pd-page">
        <div class="container">
            <div class="page-company">
                <div class="row">
                    <div class="col-lg-3">
                        @include('Statics::block.left')
                    </div>
                    <div class="col-lg-9">
                        <div class="commitment">
                            <h3>
                                <b></b>
                                <span>{!! $data->statics_title !!}</span>
                                <b></b>
                            </h3>
                        </div>
                        <div class="dich-vu">
                            {!! stripslashes($data->statics_content) !!}
                        </div>
                        <div class="linkPage">
                            <ul>
                                @if(isset($data_id) && !empty($data_id))
                                    @foreach($data_id as $key => $item)
                                        @if($item->category_id != 703)
                                            <li><a href="{{ FuncLib::buildLinkDetailStatic($item->category_id, $item->category_title) }}">{!! $item->category_title !!}.</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!---------row---------->
        </div>
    </div>
@stop
