<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 06/2016
* @Version   : 1.0
*/
namespace App\Modules\Statics\Controllers;

use App\Library\PHPDev\Loader;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Pagging;
use App\Library\PHPDev\Utility;
use App\Modules\Models\Category;
use App\Modules\Models\Contact;
use App\Modules\Models\Info;
use App\Modules\Models\Statics;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class StaticsController extends BaseStaticsController{

    public function index(){

        Loader::loadJS('libs/owl.carousel/owl.carousel.min.js', CGlobal::$postEnd);
        Loader::loadCSS('libs/owl.carousel/owl.carousel.min.css', CGlobal::$postHead);

        $text_1 = self::viewShareVal('TEXT_1');
        $text_2 = self::viewShareVal('TEXT_3');
        $text_3 = self::viewShareVal('TEXT_4');
        $text_4 = self::viewShareVal('TEXT_5');
        $text_5 = self::viewShareVal('TEXT_6');
        $text_6 = self::viewShareVal('TEXT_7');
        $text_7 = self::viewShareVal('TEXT_8');
        $text_8 = self::viewShareVal('TEXT_9');

        $arr_text_2 = Info::getItemByKeyword('TEXT_2');

        $cat_1 = (int)strip_tags(self::viewShareVal('CAT_ID_1'));
        $data_cat_1 = [];
        if ($cat_1 > 0){
            $data_search_1['statics_catid'] = $cat_1;
            $data_search_1['statics_order_no'] ='asc';
            $data_cat_1 = Statics::getFocus($data_search_1, $limit = 3);
        }

        $cat_2 = (int)strip_tags(self::viewShareVal('CAT_ID_2'));
        $data_cat_2 = [];
        if ($cat_2 > 0){
            $data_search_2['statics_catid'] = $cat_2;
            $data_search_2['statics_order_no'] = 'asc';
            $data_cat_2 = Statics::getFocus($data_search_2, $limit = 3);
        }

        $cat_3 = (int)strip_tags(self::viewShareVal('CAT_ID_3'));
        $data_cat_3 = [];
        if ($cat_3 > 0){
            $data_search_3['statics_catid'] = $cat_3;
            $data_search_3['statics_order_no'] = 'asc';
            $data_cat_3 = Statics::getFocus($data_search_3, $limit = 3);
        }

        $cat_5 = (int)strip_tags(self::viewShareVal('CAT_ID_5'));
        $data_cat_5 = [];
        if ($cat_5 > 0){
            $data_search_5['statics_catid'] = $cat_5;
            $data_search_5['statics_order_no'] = 'asc';
            $data_cat_5 = Statics::getFocus($data_search_5, $limit = 3);
        }

        $messages = Utility::messages('messages');

        return view('Statics::content.index', [
            'messages'=>$messages,
            'text_1' => $text_1,
            'text_2' => $text_2,
            'text_3' => $text_3,
            'text_4' => $text_4,
            'text_5' => $text_5,
            'text_6' => $text_6,
            'text_7' => $text_7,
            'text_8' => $text_8,
            'arr_text_2' => $arr_text_2,
            'data_cat_1' => $data_cat_1,
            'data_cat_2' => $data_cat_2,
            'data_cat_3' => $data_cat_3,
            'data_cat_5' => $data_cat_5,
        ]);
    }

    public function actionRouter($catname, $catid){
        if($catid > 0 && $catname != ''){
            $arrCat = Category::getById($catid);
            if($arrCat != null){
                $type_keyword = $arrCat->category_type_keyword;
                if($type_keyword == 'group_statics'){
                    return self::pageStatic($catname, $catid);
                }
                elseif ($type_keyword == 'group_contact'){
                    return self::pageContact($catname, $catid);
                }
                elseif ($type_keyword == 'group_product'){
                    return self::pageProduct($catname, $catid);
                }
                elseif ($type_keyword == 'group_buy'){
                    return self::pageBuy($catname, $catid);
                }
            }else{
                return Redirect::route('page.404');
            }
        }else{
            return Redirect::route('page.404');
        }
    }

    public function pageStatic($catname, $catid){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit = 10;
        $offset = ($pageNo - 1)*$limit;
        $search = $data = $dataCate = array();
        $total = 0;
        $paging = '';

        if ($catid > 0){
            $search['statics_cat_alias'] = $catname;
            $search['statics_catid'] = $catid;
            $search['statics_status'] = CGlobal::status_show;
            $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
            $data = Statics::searchByCondition($search, $limit, $offset, $total);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
            $dataCate = Category::getById($catid);

        }

        $text_6 = self::viewShareVal('TEXT_7');
        $text_7 = self::viewShareVal('TEXT_8');
        $text_8 = self::viewShareVal('TEXT_9');
        $text_9 = self::viewShareVal('TEXT_10');
        $text_11 = self::viewShareVal('TEXT_12');

        $cat_4 = (int)strip_tags(self::viewShareVal('CAT_ID_4'));
        $data_cat_4 = [];
        if ($cat_4 > 0){
            $data_search_4['statics_catid'] = $cat_4;
            $data_search_4['statics_order_no'] = 'asc';
            $data_cat_4 = Statics::getFocus($data_search_4, $limit = 4);
        }

        $cat_6 = (int)strip_tags(self::viewShareVal('CAT_ID_6'));
        $data_cat_6 = [];
        if ($cat_6 > 0){
            $data_search_6['statics_catid'] = $cat_6;
            $data_search_6['statics_order_no'] = 'asc';
            $data_cat_6 = Statics::getFocus($data_search_6, $limit = 2);
        }

        return view('Statics::content.pageStatics',[
            'data' => $data,
            'dataCate' => $dataCate,
            'paging' => $paging,
            'text_9' => $text_9,
            'text_6' => $text_6,
            'text_7' => $text_7,
            'text_8' => $text_8,
            'text_11' => $text_11,
            'data_cat_4' => $data_cat_4,
            'data_cat_6' => $data_cat_6
        ]);
    }

    public function pageContact($catname, $catid){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit = 10;
        $offset = ($pageNo - 1)*$limit;
        $search = $data = $dataCate = array();
        $total = 0;
        $paging = '';

        if ($catid > 0 && $catname != ''){
            $search['statics_cat_alias'] = $catname;
            $search['statics_catid'] = $catid;
            $search['statics_status'] = CGlobal::status_show;
            $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
            $data = Statics::searchByCondition($search, $limit, $offset, $total);
            $dataCate = Category::getById($catid);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
        }

        $arr_text_3 = Info::getItemByKeyword('TEXT_13');
        $text_6 = self::viewShareVal('TEXT_7');
        $text_7 = self::viewShareVal('TEXT_8');
        $text_8 = self::viewShareVal('TEXT_9');
        $text_9 = self::viewShareVal('TEXT_10');
        $text_12 = self::viewShareVal('TEXT_14');
        $text_13 = self::viewShareVal('TEXT_15');
        $text_14 = self::viewShareVal('TEXT_16');
        $text_15 = self::viewShareVal('TEXT_17');
        $image_1 = Info::getItemByKeyword('SITE_IMAGE');
        $arr_text_4 = Info::getItemByKeyword('TEXT_18');

        $cat_4 = (int)strip_tags(self::viewShareVal('CAT_ID_4'));
        $data_cat_4 = [];
        if ($cat_4 > 0){
            $data_search_4['statics_catid'] = $cat_4;
            $data_search_4['statics_order_no'] = 'asc';
            $data_cat_4 = Statics::getFocus($data_search_4, $limit = 4);
        }

        $cat_7 = (int)strip_tags(self::viewShareVal('CAT_ID_7'));
        $data_cat_7 = [];
        if ($cat_7 > 0){
            $data_search_7['statics_catid'] = $cat_7;
            $data_search_7['statics_order_no'] = 'asc';
            $data_cat_7 = Statics::getFocus($data_search_7, $limit = 10);
        }

        return view('Statics::content.pageContact',[
            'data' => $data,
            'search' => $search,
            'paging' => $paging,
            'dataCate' => $dataCate,
            'arr_text_3' => $arr_text_3,
            'text_6' => $text_6,
            'text_7' => $text_7,
            'text_8' => $text_8,
            'text_9' => $text_9,
            'text_12' => $text_12,
            'text_13' => $text_13,
            'text_14' => $text_14,
            'text_15' => $text_15,
            'image_1' => $image_1,
            'arr_text_4' => $arr_text_4,
            'data_cat_4' => $data_cat_4,
            'data_cat_7' => $data_cat_7,
        ]);
    }

    public function pageProduct($catname, $catid){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit = 1;
        $offset = ($pageNo - 1)*$limit;
        $total = 0;
        $search = $data = $dataCate = array();
        $paging = '';

        if ($catid > 0 && $catname != '' ){
            $search['statics_cat_alias'] = $catname;
            $search['statics_status'] = CGlobal::status_show;
            $search['statics_caid'] = $catid;
            $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
            $data = Statics::searchByCondition($search, $limit, $offset, $total);
            $dataCate = Category::getById($catid);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
        }

        $arr_text_5 = Info::getItemByKeyword('TEXT_19');
        $arr_text_6 = Info::getItemByKeyword('TEXT_20');
        $arr_text_7 = Info::getItemByKeyword('TEXT_21');
        $arr_text_8 = Info::getItemByKeyword('TEXT_22');
        $arr_text_9 = Info::getItemByKeyword('TEXT_23');
        $text_5 = self::viewShareVal('TEXT_6');
        $text_6 = self::viewShareVal('TEXT_7');
        $text_7 = self::viewShareVal('TEXT_8');
        $text_8 = self::viewShareVal('TEXT_9');
        $cat_3 = (int)strip_tags(self::viewShareVal('CAT_ID_3'));
        $data_cat_3 = [];
        if ($cat_3 > 0){
            $data_search_3['statics_catid'] = $cat_3;
            $data_search_3['statics_order_no'] = 'asc';
            $data_cat_3 = Statics::getFocus($data_search_3, $limit = 3);
        }
        $text_4 = self::viewShareVal('TEXT_24');

        return view('Statics::content.pageProduct',[
            'data' => $data,
            'search' => $search,
            'dataCate' => $dataCate,
            'paging' => $paging,
            'arr_text_5' => $arr_text_5,
            'arr_text_6' => $arr_text_6,
            'arr_text_7' => $arr_text_7,
            'arr_text_8' => $arr_text_8,
            'arr_text_9' => $arr_text_9,
            'text_5' => $text_5,
            'text_6' => $text_6,
            'text_7' => $text_7,
            'text_8' => $text_8,
            'data_cat_3' => $data_cat_3,
            'text_4' => $text_4
        ]);
    }

    public function pageBuy($catname, $catid){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit = 1;
        $offset = ($pageNo - 1)*$limit;
        $total = 0;
        $search = $data = $dataCate = array();
        $paging = '';

        if ($catid > 0 && $catname != '' ){
            $search['statics_cat_alias'] = $catname;
            $search['statics_status'] = CGlobal::status_show;
            $search['statics_caid'] = $catid;
            $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
            $data = Statics::searchByCondition($search, $limit, $offset, $total);
            $dataCate = Category::getById($catid);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
        }

        $arr_text_10 = Info::getItemByKeyword('TEXT_25');
        $arr_text_11 = Info::getItemByKeyword('TEXT_26');
        $arr_text_12 = Info::getItemByKeyword('TEXT_29');
        $arr_text_13 = Info::getItemByKeyword('TEXT_27');
        $arr_text_14 = Info::getItemByKeyword('TEXT_30');
        $arr_text_15 = Info::getItemByKeyword('TEXT_31');
        $arr_text_16 = Info::getItemByKeyword('TEXT_33');
        $text_16 = self::viewShareVal('TEXT_28');
        $text_17 = self::viewShareVal('TEXT_32');
        $cat_8 = (int)strip_tags(self::viewShareVal('CAT_ID_8'));
        $data_cat_8 = [];
        if ($cat_8 > 0){
            $data_search_8['statics_catid'] = $cat_8;
            $data_search_8['statics_order_no'] = 'asc';
            $data_cat_8 = Statics::getFocus($data_search_8, $limit = 10);
        }

        return view('Statics::content.pageBuy',[
            'data' => $data,
            'paging' => $paging,
            'search' => $search,
            'dataCate' => $dataCate,
            'arr_text_10' => $arr_text_10,
            'arr_text_11' => $arr_text_11,
            'arr_text_12' => $arr_text_12,
            'arr_text_13' => $arr_text_13,
            'text_16' => $text_16,
            'arr_text_14' => $arr_text_14,
            'arr_text_15' => $arr_text_15,
            'text_17' => $text_17,
            'arr_text_16' => $arr_text_16,
            'data_cat_8' => $data_cat_8
        ]);
    }


    public function pageContactPost(){
        if (!empty($_POST)){
            $contact_name = addslashes(Request::get('contact_name', ''));
            $contact_phone = addslashes(Request::get('contact_phone', ''));
            $contact_content = addslashes(Request::get('contact_content', ''));
            $contact_created = time();

            if ($contact_name != '' && $contact_phone != '' && $contact_content != '' ){
                $dataInput = array(
                    'contact_name' => $contact_name,
                    'contact_phone' => $contact_phone,
                    'contact_content' => $contact_content,
                    'contact_created' => $contact_created,
                    'contact_status' => 1,
                );

                $query = Contact::addData($dataInput);
                if ($query > 0){
                    Utility::messages('messages', 'Cảm ơn bạn đã đăng ký. Chúng tôi sẽ liên hệ bạn sớm nhất');
                    return Redirect::route('SIndex');
                }
            }
            Utility::messages('messages', 'Thông tin liên hệ chưa đúng. Mời bạn đăng ký lại!');
            return Redirect::route('SIndex');
        }

    }

    public function pageSearch(){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll  = CGlobal::num_scroll_page;
        $limit = 10;
        $offset = ($pageNo - 1) *$limit;
        $total = 0;
        $search = $data = array();

        $search['statics_title'] = addslashes(Request::get('statics_title', ''));
        $search['statics_status'] = (int)Request::get('statics_status', -1);
        $search['submit'] = (int)Request::get('submit', 0);
        $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';

        $dataSearch = Statics::searchByCondition($search, $limit, $offset, $total);
        $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';

        return view('Statics::content.pageSearch',[
            'data' => $dataSearch,
            'search' => $search,
            'paging' => $paging
        ]);
    }

    public function DetailStatics($name = '', $id = 0){
        $data = $dataSame = $dataCate = array();
        if($id > 0){
            $data = Statics::getById($id);
            if(!isset($data->statics_id)){
                return Redirect::route('page.404');
            }
            $dataCate = Category::getById($data->statics_catid);
        }

        $searchSame['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
        $dataSame = Statics::getSameData($id, $data->statics_catid,$limit=10, $searchSame);

        $cat_4 = (int)strip_tags(self::viewShareVal('CAT_ID_4'));
        $data_cat_4 = [];
        if ($cat_4 > 0){
            $data_search_4['statics_catid'] = $cat_4;
            $data_search_4['statics_order_no'] = 'asc';
            $data_cat_4 = Statics::getFocus($data_search_4, $limit = 4);
        }
        $text_5 = self::viewShareVal('TEXT_5');

        return view('Statics::content.pageStaticsDetail',[
            'id' => $id,
            'dataCate' => $dataCate,
            'data' => $data,
            'dataSame' => $dataSame,
            'data_cat_4' => $data_cat_4,
            'text_5' => $text_5,
        ]);
    }
}