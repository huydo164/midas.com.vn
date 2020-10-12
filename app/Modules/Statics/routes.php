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


    Route::get('dich-vu', array('as' => 'site.pageServices', 'uses' => 'StaticsController@pageServices'));
    Route::get('dich-vu/{name}-{id}.html', array('as' => 'site.pageStaticsDetail', 'uses' => 'StaticsController@pageStaticsDetail'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');
    Route::get('cac-du-an-da-thuc-hien', array('as' => 'site.pageProject', 'uses' => 'StaticsController@pageProject'));

    Route::get('cong-ty', array('as' => 'site.pageCompany', 'uses' => 'StaticsController@pageCompany'));

    Route::get('thu-vien', array('as' => 'site.pageLibrary', 'uses'  => 'StaticsController@pageLibrary'));


    Route::get('{name}-{id}.html',array('as' => 'site.actionRouter','uses' =>'StaticsController@actionRouter', 'permission_name'=>'Tin tức'))->where('name', '[A-Z0-9a-z)_\-]+')->where('id', '[0-9]+');

    Route::get('Tim-kiem', array('as' => 'site.pageSearch', 'uses' => 'StaticsController@pageSearch'));


    Route::get('contact', array('as' => 'site.pageContact', 'uses' => 'StaticsController@pageContact'))->where('name', '[A-Z0-9a-z_\-]+')->where('id', '[0-9]+');
    Route::post('lien-he', array('as' => 'site.pageContactPost', 'uses' => 'StaticsController@pageContactPost'));




});