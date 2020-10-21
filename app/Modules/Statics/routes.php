<?php
/*
* @Created by: DUYNX
* @Author    : duynx@peacesoft.net / nguyenduypt86@gmail.com
* @Date      : 08/2019
* @Version   : 1.0
*/
$namespace = '\App\Modules\Statics\Controllers';

Route::group(['middleware' => ['web'], 'prefix' => '/', 'namespace' => $namespace], function(){

    Route::get('403', array('as' => 'page.403','uses' => 'BaseStaticsController@page403'));
    Route::get('404', array('as' => 'page.404','uses' => 'BaseStaticsController@page404'));

    Route::get('/', array('as' => 'SIndex','uses' => 'StaticsController@index'));

    Route::get('ve-chung-toi' , array('as'=> 'site.aboutme', 'uses' => 'StaticsController@aboutme'));



    Route::get('contact', array('as' => 'site.PageContact','uses' => 'StaticsController@pageContact'));
    Route::post('contact', array('as' => 'site.pageContactPost','uses' => 'StaticsController@pageContactPost'));

    Route::get('khach-hang', array('as' => 'site.PageCustomer','uses' => 'StaticsController@PageCustomer'));


    Route::get('dich-vu', array('as' => 'site.pageServices', 'uses' => 'StaticsController@pageServices'));
    Route::get('dich-vu/{name}-{id}.html', array('as' => 'site.pageStaticsDetail', 'uses' => 'StaticsController@pageStaticsDetail'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');
    Route::get('cac-du-an-da-thuc-hien', array('as' => 'site.pageProject', 'uses' => 'StaticsController@pageProject'));

    Route::get('cong-ty', array('as' => 'site.pageCompany', 'uses' => 'StaticsController@pageCompany'));

    Route::get('thu-vien', array('as' => 'site.pageLibrary', 'uses'  => 'StaticsController@pageLibrary'));

    Route::get('{name}-{id}.html',array('as' => 'site.actionRouter','uses' =>'StaticsController@actionRouter', 'permission_name'=>'Tin tức'))->where('name', '[A-Z0-9a-z)_\-]+')->where('id', '[0-9]+');

   
    Route::get('danh-muc/{name}-{id}.html', array('as' => 'site.pageProPor', 'uses' => 'StaticsController@pageProPor'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');
    Route::get('danh-muc-san-pham/{name}-{id}.html', array('as' => 'site.pageProductDetail', 'uses' => 'StaticsController@pageProductDetail' ))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');
    Route::get('chi-tiet-san-pham/{name}-{id}.html',array('as' => 'site.pageProduct', 'uses' => 'StaticsController@pageProduct' ))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');

    Route::get('tim-kiem', array('as' => 'site.pageSearch', 'uses' => 'StaticsController@pageSearch'));
    Route::post('tim-kiem-theo-kick-thuoc' , array('as'=>'site.pageSearchSize', 'uses'=>'StaticsController@pageSearchSize'));
    Route::post('tim-kiem-theo-mau-sac' , array('as'=>'site.pageSearchColor', 'uses'=>'StaticsController@pageSearchColor'));

    Route::post('gio-hang' , array('as'=>'site.pageCart', 'uses'=>'StaticsController@pageCart'));

    Route::post('gio-hang-cap-nhat' , array('as'=>'site.updateCart', 'uses'=>'StaticsController@updateCart'));
    Route::post('xoa-mot-san-pham' , array('as'=>'site.deleteCart', 'uses'=>'StaticsController@deleteCart'));

    Route::post('thanh-toan' , array('as'=>'site.pagePay', 'uses'=>'StaticsController@pagePay'));
    Route::post('dat-hang', array('as'=>'site.pageOrder', 'uses'=>'StaticsController@pageOrder'));

    Route::get('{name}', array('as' => 'site.pageTag', 'uses' => 'StaticsController@pageTag'));
    Route::get('dich-vu/{name}', array('as' => 'site.pageTag', 'uses' => 'StaticsController@pageTag'));
    Route::get('tag', array('as' => 'site.pageTagDetail', 'uses' => 'StaticsController@pageTagDetail'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');;



});