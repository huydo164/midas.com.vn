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



    Route::get('contact', array('as' => 'SIndex','uses' => 'StaticsController@pageContact'));

    Route::get('{name}-{id}.html', array('as' => 'site.pageStatics' , 'uses' => 'StaticsController@pageStatics'));
    Route::get('dich-vu/{name}-{id}.html', array('as' => 'site.pageStaticsDetail', 'uses' => 'StaticsController@pageStaticsDetail'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');

    Route::get('cong-ty', array('as' => 'site.pageCompany', 'uses' => 'StaticsController@pageCompany'));

    Route::get('thu-vien', array('as' => 'site.pageLibrary', 'uses'  => 'StaticsController@pageLibrary'));


    Route::get('{name}-{id}.html',array('as' => 'site.actionRouter','uses' =>'StaticsController@actionRouter', 'permission_name'=>'Tin tức'))->where('name', '[A-Z0-9a-z)_\-]+')->where('id', '[0-9]+');
    /*
    Route::get('tin-tuc', array('as' => 'site.pageStatic', 'uses' => 'StaticsController@pageStatic'));
    Route::get('tin-tuc/{name}-{id}.html', array('as' => 'site.detailStatics', 'uses' => 'StaticsController@DetailStatics'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');

    Route::get('benh-ly/{name}-{id}.html', array('as' => 'site.pageContact', 'uses' =>'StaticsController@pageContact'));

    Route::get('san-pham/{name}-{id}.html', array('as' => 'site.pageProduct', 'uses' => 'StaticsController@pageProduct'));

    Route::get('dat-mua/{name}-{id}.html', array('as' => 'site.pageBuy', 'uses' => 'StaticsController@pageBuy'));

    Route::post('dang-ky', array('as' => 'site.pageContactPost', 'uses' => 'StaticsController@pageContactPost'));

    Route::get('Tim-kiem', array('as' => 'site.pageStaticsSearch', 'uses' => 'StaticsController@pageSearch'));
    */

    Route::get('contact', array('as' => 'site.pageContact', 'uses' => 'StaticsController@pageContact'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');
    Route::post('lien-he', array('as' => 'site.pageContactPost', 'uses' => 'StaticsController@pageContactPost'));
    


});