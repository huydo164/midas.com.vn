<?php
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\CGlobal;
?>
@extends('Admin::layout.html')
@section('header')
    @include('Admin::block.header')
@stop
@section('left')
    @include('Admin::block.left')
@stop
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{URL::route('admin.dashboard')}}">Trang chủ</a>
                    </li>
                    <li class="active">Quản lý bài viết tĩnh</li>
                </ul>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-info @if(isset($search['submit']) && $search['submit'] == CGlobal::status_show) act @endif">
                            <form id="frmSearch" method="GET" action="" class="frmSearch" name="frmSearch">
                                <div class="panel-body panel-search">
                                    <div class="form-group col-lg-2">
                                        <label class="control-label">Từ khóa</label>
                                        <div>
                                            <input type="text" class="form-control input-sm" name="rating_title" @if(isset($search['rating_name']) && $search['rating_name'] !='')value="{{$search['rating_name']}}"@endif>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-footer text-right">
                                    <a class="btn btn-default btn-sm" class="reset" href="{{route('admin.rating')}}"><i class="fa fa-recycle"></i>Bỏ lọc</a>
                                    <a class="btn btn-danger btn-sm" href="{{FuncLib::getBaseUrl()}}admin/rating/edit"><i class="ace-icon fa fa-plus-circle"></i>Thêm mới</a>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit" value="1"><i class="fa fa-search"></i> Tìm kiếm</button>
                                    <a href="javascript:void(0)" title="Xóa item" id="deleteMoreItem" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Xóa</a>
                                    <span class="btn btn-warning btn-sm clickSearchDrop">Mở rộng</span>
                                </div>
                            </form>
                        </div>
                        @if(isset($messages) && $messages != '')
                            {!! $messages !!}
                        @endif
                        @if(sizeof($data) > 0)
                            @if($total>0)
                                <div class="show-bottom-info">
                                    <div class="total-rows">Tổng số: <b>{{$total}}</b></div>
                                    <div class="list-item-page">
                                        <div class="showListPage">{!! $paging !!}</div>
                                    </div>
                                </div>
                            @endif
                            <br>
                            <form id="formListItem" method="POST" action="{{FuncLib::getBaseUrl()}}admin/rating/delete" class="formListItem" name="txtForm">
                                <table class="table table-bordered table-hover">
                                    <thead class="thin-border-bottom">
                                    <tr>
                                        <th width="2%">STT</th>
                                        <th width="1%">
                                            <label class="pos-rel">
                                                <input id="checkAll" class="ace" type="checkbox">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th width="10%">Tên người đánh giá</th>
                                        <th width="5%">Email</th>
                                        <th width="5%">Comment</th>
                                        <th width="5%">Sao đánh giá</th>
                                        <th width="5%">Địa chỉ IP</th>
                                        <th width="5%">Trạng thái</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$item)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>
                                                <label class="pos-rel">
                                                    <input class="ace checkItem" name="checkItem[]" value="{{$item['rating_id']}}" type="checkbox">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td><a target="_blank" title="{{$item->rating_name}}" href="">{{$item['rating_name']}}</a></td>
                                            <td><a target="_blank" title="{{$item->rating_email}}" href="">{{$item['rating_email']}}</a></td>
                                            <td><a target="_blank" title="{{$item->rating_detail}}" href="">{{$item['rating_detail']}}</a></td>
                                            <td><a target="_blank" title="{{$item->rating_star}}" href="">{{$item['rating_star']}}</a></td>
                                            <td><a target="_blank" title="{{$item->rating_ip}}" href="">{{$item['rating_ip']}}</a></td>
                                            <td>
                                                <a target="_blank" title="{{$item->rating_status}}" href="">
                                                    {{($item['rating_status']==0) ? 'Ẩn' : 'Hiện' }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{FuncLib::getBaseUrl()}}admin/rating/edit/{{$item['rating_id']}}" title="Cập nhật">
                                                    <i class="fa fa-edit fa-admin"></i>
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                @if($total>0)
                                    <div class="show-bottom-info">
                                        <div class="total-rows">Tổng số: <b>{{$total}}</b></div>
                                        <div class="list-item-page">
                                            <div class="showListPage">{!! $paging !!}</div>
                                        </div>
                                    </div>
                                @endif
                                {!! csrf_field() !!}
                            </form>
                        @else
                            <div class="alert">
                                Không có dữ liệu
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
