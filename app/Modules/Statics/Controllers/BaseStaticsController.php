<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 06/2016
* @Version   : 1.0
*/
namespace App\Modules\Statics\Controllers;

use App\Modules\Models\Banner;
use App\Modules\Models\Category;
use App\Modules\Models\Info;
use App\Modules\Models\User;

use App\Modules\Models\Statics;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\Loader;
use App\Library\PHPDev\SEOMeta;
use App\Library\PHPDev\ThumbImg;
use Illuminate\Support\Facades\View;

class BaseStaticsController extends Controller{

    public function __construct(){

        $arrOnline = Info::getItemByKeyword('SITE_ONLINE');
        if(isset($arrOnline->info_status) && $arrOnline->info_status == CGlobal::status_show){
            $this->middleware(function ($request, $next) {
                $users = User::userLogin();
                if(sizeof($users) == 0){
                    header('Content-Type: text/html; charset=utf-8');
                    echo '<div style="text-align: center"><img src="'.FuncLib::getBaseUrl().'assets/frontend/img/maintain.png"></div>';
                    echo '<div style="text-align: center; margin-top:10px">'.CGlobal::txtMaintain.'</div>';die;
                }
                return $next($request);
            });
        }

        Loader::loadJS('frontend/js/site.js', CGlobal::$postEnd);
        Loader::loadJS('libs/jAlert/jquery.alerts.js', CGlobal::$postEnd);
        Loader::loadCSS('libs/jAlert/jquery.alerts.css', CGlobal::$postHead);
        Loader::loadCSS('libs/fontAwesome/css/font-awesome.min.css', CGlobal::$postHead);

        $bannerHeader['banner_status'] = CGlobal::status_show;
        $bannerHeader['banner_type'] = 0;
        $bannerHeader['field_get'] = 'banner_id,banner_title,banner_title_show,banner_image,banner_link,banner_is_target,banner_is_rel,banner_is_run_time,banner_start_time,banner_end_time';
        $dataBannerHeader = Banner::getBannerSite($bannerHeader, $limit = 2, 'header');
        $dataBannerHeader = FuncLib::checkBannerShow($dataBannerHeader);

        View::share('dataBannerHeader', $dataBannerHeader);

        $bannerPage['banner_status'] = CGlobal::status_show;
        $bannerPage['banner_type'] = 1;
        $bannerPage['field_get'] = 'banner_id,banner_title,banner_title_show,banner_image,banner_link,banner_is_target,banner_is_rel,banner_is_run_time,banner_start_time,banner_end_time';
        $dataBannerPage = Banner::getBannerSite($bannerPage, $limit = 1, 'header page');
        $dataBannerPage = FuncLib::checkBannerShow($dataBannerPage);
        View::share('dataBannerPage', $dataBannerPage);



        $arrCategory = Category::getAllCategory(0, array(), 0);
        View::share('arrCategory',$arrCategory);


        $arrTextLogo = Info::getItemByKeyword('SITE_LOGO');
        View::share('arrTextLogo',$arrTextLogo);

        $text_1 = Info::getItemByKeyword('SITE_FOOTER_TEXT_1');
        View::share('text1',$text_1);

        $text_1 = Info::getItemByKeyword('SITE_FOOTER_TEXT_1');
        View::share('text1',$text_1);
        $text_sdt = Info::getItemByKeyword('SITE_FOOTER_TEXT_SDT');
        View::share('text_sdt',$text_sdt);
        $text_add = Info::getItemByKeyword('SITE_FOOTER_TEXT_ADDRESS');
        View::share('text_add',$text_add);
        $text_mail = Info::getItemByKeyword('SITE_FOOTER_TEXT_MAIL');
        View::share('text_mail',$text_mail);
        $text_bot = Info::getItemByKeyword('SITE_FOOTER_TEXT_BOT');
        View::share('text_bot',$text_bot);

        $cat_support   = (int)strip_tags(self::viewShareVal('CAT_ID_SUPPORT'));
        $name_cat_support  = Info::getItemByKeyword('CAT_ID_SUPPORT');
        $data_support  = [];
        if ($data_support  > 0){
            $data_search_support ['statics_catid'] = $cat_support ;
            $data_search_support ['statics_order_no'] = 'asc';
            $data_support  = Statics::getFocus($data_search_support, $limit = 10);
        }
        View::share('data_support',$data_support);
        View::share('name_cat_support',$name_cat_support);

        $cat_chinhsach   = (int)strip_tags(self::viewShareVal('CAT_ID_CHINHSACH'));
        $name_cat_chinhsach  = Info::getItemByKeyword('CAT_ID_CHINHSACH');
        $data_chinhsach  = [];
        if ($data_chinhsach  > 0){
            $data_search_chinhsach ['statics_catid'] = $cat_chinhsach ;
            $data_search_chinhsach ['statics_order_no'] = 'asc';
            $data_chinhsach  = Statics::getFocus($data_search_chinhsach, $limit = 10);
        }

        View::share('data_chinhsach',$data_chinhsach);
        View::share('name_cat_chinhsach',$name_cat_chinhsach);

        $cat_hotline   = (int)strip_tags(self::viewShareVal('CAT_ID_HOTLINE'));
        $name_cat_hotline  = Info::getItemByKeyword('CAT_ID_HOTLINE');
        $data_hotline  = [];
        if ($data_hotline  > 0){
            $data_search_hotline ['statics_catid'] = $cat_hotline ;
            $data_search_hotline ['statics_order_no'] = 'asc';
            $data_hotline  = Statics::getFocus($data_search_hotline, $limit = 10);
        }
        View::share('data_hotline',$data_hotline);
        View::share('name_cat_hotline',$name_cat_hotline);

        $data_search_news ['statics_id'] = 'asc';
        $news = Statics::getFocus($data_search_news,5);
        View::share('news',$news);


    }
    public function page403(){
        $meta_img='';
        $meta_title = $meta_keywords = $meta_description = $txt403 = CGlobal::txt403;
        SEOMeta::init($meta_img, $meta_title, $meta_keywords, $meta_description);
        return view('Statics::errors.page-403',['txt403'=>$txt403]);
    }
    public function page404(){
        $meta_img='';
        $meta_title = $meta_keywords = $meta_description = $txt404 = CGlobal::txt404;
        SEOMeta::init($meta_img, $meta_title, $meta_keywords, $meta_description);
        return view('Statics::errors.page-404',['txt404'=>$txt404]);
    }
    public static function viewShareVal($key=''){
        $str='';
        if($key != '') {
            $arrStr = Info::getItemByKeyword($key);
            if(isset($arrStr->info_id)) {
                $str = stripslashes($arrStr->info_content);
            }
        }
       return $str;
    }
}