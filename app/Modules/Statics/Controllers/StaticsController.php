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

        $messages = Utility::messages('messages');

        $cat_dich_vu = (int)strip_tags(self::viewShareVal('CAT_ID_DICHVU'));
        $name_cat_dich_vu = Info::getItemByKeyword('CAT_ID_DICHVU');
        $data_cat_dich_vu = [];
        if ($data_cat_dich_vu > 0){
            $data_search_dich_vu['statics_catid'] = $cat_dich_vu;
            $data_search_dich_vu['statics_order_no'] = 'asc';
           
            $data_cat_dich_vu = Statics::getFocus($data_search_dich_vu, $limit = 10); 
          
        }
        $cat_commitment  = (int)strip_tags(self::viewShareVal('CAT_ID_TAISAO'));
        $name_cat_commitment = Info::getItemByKeyword('CAT_ID_TAISAO');
        $data_commitment = [];
        if ($data_commitment > 0){
            $data_search_commitment['statics_catid'] = $cat_commitment;
            $data_search_commitment['statics_order_no'] = 'asc';
            $data_commitment = Statics::getFocus($data_search_commitment, $limit = 10);
        }


        $cat_collection  = (int)strip_tags(self::viewShareVal('CAT_ID_BST'));
        $name_cat_collection = Info::getItemByKeyword('CAT_ID_BST');
        $data_collection = [];
        if ($data_collection > 0){
            $data_search_collection['statics_catid'] = $cat_collection;
            $data_search_collection['statics_order_no'] = 'asc';
            $data_collection = Statics::getFocus($data_search_collection, $limit = 10);
        }

        $cat_finish   = (int)strip_tags(self::viewShareVal('CAT_ID_DUANTHUCHIEN'));
        $name_cat_finish  = Info::getItemByKeyword('CAT_ID_DUANTHUCHIEN');
        $data_finish  = [];
        if ($data_finish  > 0){
            $data_search_finish ['statics_catid'] = $cat_finish ;
            $data_search_finish ['statics_order_no'] = 'asc';
            $data_finish  = Statics::getFocus($data_search_finish, $limit = 10);
        }

        $cat_testimonials   = (int)strip_tags(self::viewShareVal('CAT_ID_CAMNHAN'));
        $name_cat_testimonials  = Info::getItemByKeyword('CAT_ID_CAMNHAN');
        $data_testimonials  = [];
        if ($data_testimonials  > 0){
            $data_search_testimonials ['statics_catid'] = $cat_testimonials ;
            $data_search_testimonials ['statics_order_no'] = 'asc';
            $data_testimonials  = Statics::getFocus($data_search_testimonials, $limit = 10);
        }


        $cat_aboutme   = (int)strip_tags(self::viewShareVal('CAT_ID_ABOUTME'));
        $data_aboutme  = [];
        if ($data_aboutme  > 0){
            $data_search_aboutme ['statics_catid'] = $cat_aboutme ;
            $data_search_aboutme ['statics_order_no'] = 'asc';
            $data_aboutme  = Statics::getFocus($data_search_aboutme, $limit = 1);
        }

        

        return view('Statics::content.index',[
            'messages' => $messages,
            'data_cat_dich_vu' => $data_cat_dich_vu,
            'name_cat_dich_vu' => $name_cat_dich_vu,
            'data_commitment' => $data_commitment,
            'name_cat_commitment' => $name_cat_commitment,
            'data_collection' => $data_collection,
            'name_cat_collection' => $name_cat_collection,
            'data_finish' => $data_finish,
            'name_cat_finish' => $name_cat_finish,
            'data_testimonials' => $data_testimonials,
            'name_cat_testimonials' => $name_cat_testimonials,
            'data_aboutme' => $data_aboutme,
            
        ]);
    }

    // public function actionRouter($catname, $catid){
    //     if($catid > 0 && $catname != ''){
    //         $arrCat = Category::getById($catid);
    //         if($arrCat != null){
    //             $type_keyword = $arrCat->category_type_keyword;
    //             if($type_keyword == 'group_statics'){
    //                 return self::pageStatic($catname, $catid);
    //             }
    //             elseif ($type_keyword == 'group_contact'){
    //                 return self::pageContact($catname, $catid);
    //             }
    //             elseif ($type_keyword == 'group_product'){
    //                 return self::pageProduct($catname, $catid);
    //             }
    //             elseif ($type_keyword == 'group_buy'){
    //                 return self::pageBuy($catname, $catid);
    //             }
    //         }else{
    //             return Redirect::route('page.404');
    //         }
    //     }else{
    //         return Redirect::route('page.404');
    //     }
    // }

    public function pageContact(){
        Loader::loadJS('libs/owl.carousel/owl.carousel.min.js', CGlobal::$postEnd);
        Loader::loadCSS('libs/owl.carousel/owl.carousel.min.css', CGlobal::$postHead);

        $messages = Utility::messages('messages');
        return view('Statics::content.contact',[
            'messages' => $messages
        ]);
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

    public function pageContactPost(){
        if (!empty($_POST)){
           $contact_name  = addslashes(Request::get('contact_name', ''));
           $contact_phone = addslashes(Request::get('contact_phone', ''));
           $contact_email = addslashes(Request::get('contact_email', ''));
           $contact_content = addslashes(Request::get('contact_content', ''));
           $contact_created = time();

           if ($contact_name != '' && $contact_phone != '' && $contact_content != ''){
               $dataInput = array(
                   'contact_name' => $contact_name,
                   'contact_phone' => $contact_phone,
                   'contact_email' => $contact_email,
                   'contact_content' => $contact_content,
                   'contact_status' => 1,
                   'contact_created' => $contact_created,
               );
               $query = Contact::addData($dataInput);

               if ($query > 0){
                   Utility::messages('messages', 'Cảm ơn bạn đã đăng ký. Chúng tôi sẽ liên hệ với bạn sớm nhất');
                   return Redirect::route('SIndex');
               }
           }
           else{
               Utility::messages('messages' , 'Thông tin liên hệ chưa chính sác. Bạn hãy đăng ký lại!');
               return Redirect::route('SIndex');
           }
        }
    }

}