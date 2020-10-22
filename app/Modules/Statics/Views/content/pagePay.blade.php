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
    <div class="pay">
        <div class="container">
            <form action="{{ URL::Route('site.pageOrder') }}" method="post">
                {{ csrf_field() }}
                <div class="col-lg-7 col-md-12 col-sm-12">

                    <div class="thong-tin">
                        <h3>Thông tin thanh toán</h3>
                        <div class="name">
                            <div class="ho">
                                <p>Họ</p>
                                <input type="text" name="ho" />
                            </div>
                            <div class="ten">
                                <p>Tên</p>
                                <input type="text" name="ten" />
                            </div>
                        </div>
                        <div class="country">
                            <p>Quốc gia</p>
                            <input type="text" name="country" />
                        </div>
                        <div class="country">
                            <p>Địa chỉ</p>
                            <input type="text" name="address" />
                        </div>
                        <div class="country">
                            <p>Tỉnh / Thành phố</p>
                            <input type="text" name="city" />
                        </div>
                        <div class="country">
                            <p>Huyện/Thị xã</p>
                            <input type="text" name="town" />
                        </div>
                        <div class="contact">
                            <div class="phone">
                                <p>Số điện thoại</p>
                                <input type="text" name="phone" />
                            </div>
                            <div class="email">
                                <p>Email</p>
                                <input type="text" name="email" />
                            </div>
                        </div>

                    </div>


                </div>
                <div class="col-lg-7 col-md-12 col-sm-12">

                        <div class="col-inner has-border">
                            <div class="checkout-sidebar sm-touch-scroll cc_cursor">
                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>

                                <div id="order_review" class="woocommerce-checkout-review-order">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Tổng cộng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($info as $data)

                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ stripslashes($data['title']) }}
                                                <strong class="product-quantity">× {{ $data['num'] }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="woocommerce-Price-amount amount">{{FuncLib::numberFormat($data['price'] * $data['num'])}}<span class="woocommerce-Price-currencySymbol">₫</span></span>
                                            </td>
                                        </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                        <tr class="order-total">
                                            <th>Tổng cộng</th>
                                            <td><strong><span class="woocommerce-Price-amount amount">{{ FuncLib::numberFormat($total_price) }}<span class="woocommerce-Price-currencySymbol">₫</span></span></strong> </td>
                                            <input type="hidden" value="{{ ($total_price) }}" name="total_price" />
                                        </tr>


                                        </tfoot>
                                    </table>

                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_bacs">
                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked" data-order_button_text="" style="display: none;">

                                                <label for="payment_method_bacs">
                                                    Chuyển khoản ngân hàng
                                                </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-row place-order cc_cursor">
                                            <noscript>
                                                Trình duyệt của bạn không hỗ trợ JavaScript, hoặc nó bị vô hiệu hóa, hãy đảm bảo bạn nhấp vào <em> Cập nhật giỏ hàng </em> trước khi bạn thanh toán. Bạn có thể phải trả nhiều hơn số tiền đã nói ở trên, nếu bạn không làm như vậy.			<br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Cập nhật tổng" />
                                            </noscript>



                                            <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">

                                            <input type="hidden" id="_wpnonce" name="_wpnonce" value="5f4af927af"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">	</div>
                                    </div>

                                </div>
                                <div class="html-checkout-sidebar pt-half cc_cursor">

                                </div>
                            </div>
                        </div>
                    </div>

            </form>

        </div>
    </div>
@stop
