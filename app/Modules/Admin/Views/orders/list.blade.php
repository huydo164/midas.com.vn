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
                    <li class="active">Quản lý đơn hàng</li>
                </ul>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-info @if(isset($search['submit']) && $search['submit'] == CGlobal::status_show) act @endif">
                            <form id="frmSearch" method="GET" action="" class="frmSearch" name="frmSearch">
                                <div class="panel-body panel-search">
                                    <div class="form-group col-sm-2">
                                        <label class="control-label">Tên đơn hàng</label>
                                        <div>
                                            <input  type="text" class="form-control input-sm" name="orders_title" @if(isset($search['orders_title']) && $search['orders_title'] !='')value="{{$search['orders_title']}}"@endif>
                                        </div>
                                    </div>



                                    
                                </div>
                                <div class="panel-footer text-right">
                                    <a class="btn btn-default btn-sm" class="reset" href="{{route('admin.orders')}}"><i class="fa fa-recycle"></i>Bỏ lọc</a>
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
                            <form id="formListItem" method="POST" action="{{FuncLib::getBaseUrl()}}admin/product/delete" class="formListItem" name="txtForm">
                                <table class="table table-bordered table-hover">
                                    <thead class="thin-border-bottom">
                                    <tr>
                                        <th width="2%">Mã đơn hàng</th>
                                        <th width="1%">
                                            <label class="pos-rel">
                                                <input id="checkAll" class="ace" type="checkbox">
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th width="10%">Tên khách hàng</th>
                                        <th width="8%">Số điện thoại</th>
                                        <th width="6%">Địa chỉ</th>
                                        <th width="6%">Email</th>
                                        <th width="6%">Trạng thái</th>
                                        <th width="6%">Tổng số tiền</th>
                                        <th width="3%">Ngày tạo</th>
                                        <th width="3%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k=>$item)
                                        <tr>
                                            <td>{{$item['orders_code']}}</td>
                                            <td>
                                                <label class="pos-rel">
                                                    <input class="ace checkItem" name="checkItem[]" value="{{$item['orders_id']}}" type="checkbox">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>{{$item['customer_name']}}</td>
                                            <td>{{$item['customer_phone']}}</td>
                                            <td>{{$item['customer_address']}}</td>
                                            <td>{{$item['customer_email']}}</td>
                                            <td>{{$item['orders_status']}}</td>
                                            <td>{{FuncLib::numberFormat($item['orders_price'])}}</td>
                                            <td>{{date('d/m/Y', $item['orders_created'])}}</td>
                                            <td>
                                                <a href="{{FuncLib::getBaseUrl()}}admin/orders/edit/{{$item['orders_id']}}" title="Cập nhật">
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