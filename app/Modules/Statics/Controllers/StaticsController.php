<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 06/2016
* @Version   : 1.0
*/
namespace App\Modules\Statics\Controllers;


use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\Loader;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Pagging;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ThumbImg;
use App\Modules\Models\Category;
use App\Modules\Models\Contact;
use App\Modules\Models\Info;
use App\Modules\Models\Orders;
use App\Modules\Models\Product;
use App\Modules\Models\Statics;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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

    public function actionRouter($catname, $catid){
        if($catid > 0 && $catname != ''){
            $arrCat = Category::getById($catid);
            if($arrCat != null){
                $type_keyword = $arrCat->category_type_keyword;
                if($type_keyword == 'group_statics'){
                    return self::pageStatics($catname, $catid);
                }
                else if($type_keyword == 'group_product'){
                    return self::pageProductDetail($catname, $catid);
                }

            }else{
                return Redirect::route('page.404');
            }
        }else{
            return Redirect::route('page.404');
        }
    }


    public function pageContact(){
        Loader::loadJS('libs/owl.carousel/owl.carousel.min.js', CGlobal::$postEnd);
        Loader::loadCSS('libs/owl.carousel/owl.carousel.min.css', CGlobal::$postHead);


        $messages = Utility::messages('messages');
        return view('Statics::content.contact',[
            'messages' => $messages
        ]);
    }

    public function pageStatics($catname, $catid){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit  =12;
        $offset = ($pageNo - 1)* $limit;
        $total = 0;
        $data = $search = $dataCate = array();
        $paging = '';

        if ($catid > 0){
            $search['statics_cat_name'] = $catname;
            $search['statics_catid'] = $catid;
            $search['statics_status'] = CGlobal::status_show;
            $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
            $data  = Statics::searchByCondition($search, $limit, $offset, $total);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
            $dataCate = Category::getById($catid);
        }

        $text_dich_vu = self::viewShareVal('TEXT_DICH_VU');
        $text_tu_khoa = self::viewShareVal('TEXT_TU_KHOA');
        $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');
        $text_san_pham_noi_bat = self::viewShareVal('TEXT_SAN_PHAM_CUA_CHUNG_TOI');

        $cat_cong_trinh = (int)strip_tags(self::viewShareVal('CAT_ID_CONG_TRINH'));
        $data_cong_trinh = [];
        if ($data_cong_trinh > 0){
            $data_search_cong_trinh['statics_catid'] = $cat_cong_trinh;
            $data_search_cong_trinh['statics_order_no'] = 'asc';
            $data_cong_trinh = Statics::getFocus($data_search_cong_trinh, $limit = 10);
        }

        return view('Statics::content.pageStatics',[
            'data' => $data,
            'dataCate' => $dataCate,
            'paging' => $paging,
            'text_dich_vu' => $text_dich_vu,
            'text_tu_khoa' => $text_tu_khoa,
            'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
            'data_cong_trinh' => $data_cong_trinh,
            'text_san_pham_noi_bat' => $text_san_pham_noi_bat,

        ]);
    }

    public function pageStaticsDetail($catname, $catid){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit  =12;
        $offset = ($pageNo - 1)* $limit;
        $total = 0;
        $data = $search = $dataCate = array();
        $paging = '';

        if ($catid > 0){
            $search['statics_cat_name'] = $catname;
            $search['statics_catid'] = $catid;
            $search['statics_status'] = CGlobal::status_show;
            $search['field_get'] = 'statics_id,statics_catid,statics_cat_name,statics_cat_alias,statics_title,statics_intro,statics_content,statics_image,statics_created';
            $data  = Statics::searchByCondition($search, $limit, $offset, $total);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
            $dataCate = Category::getById($catid);
        }

        $text_dich_vu = self::viewShareVal('TEXT_DICH_VU');
        $text_tu_khoa = self::viewShareVal('TEXT_Tu_Khoa');
        $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');

        $cat_dich_vu = (int)strip_tags(self::viewShareVal('CAT_ID_DICH_VU'));
        $data_dich_vu = [];
        if ($data_dich_vu > 0){
            $data_search_dich_vu['statics_catid'] = $cat_dich_vu;
            $data_search_dich_vu['statics_order_no'] = 'asc';
            $data_dich_vu = Statics::getFocus($data_search_dich_vu, $limit = 10);

        }


        return view('Statics::content.pageStaticsDetail',[
            'data' => $data,
            'dataCate' => $dataCate,
            'paging' => $paging,
            'text_dich_vu' => $text_dich_vu,
            'text_tu_khoa' => $text_tu_khoa,
            'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
            'data_dich_vu' => $data_dich_vu,

        ]);
    }

    public function pageServices(){

        $arrInfo = Info::getItemByKeyword('CAT_ID_DICH_VU');
        $id_page = isset($arrInfo->info_id) ? $arrInfo->info_content : 0;


        if($id_page > 0){
            $arrSame = array();
            $data = Statics::getById($id_page);
            if ($data->statics_catid > 0){
                $data_id = $data->statics_catid;
                if ($data_id > 0){
                    $arrSame = Category::getSubCate($data_id);
                }
            }

            $text_dich_vu = self::viewShareVal('TEXT_DICH_VU');
            $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');
            $text_san_pham_noi_bat = self::viewShareVal('TEXT_SAN_PHAM_CUA_CHUNG_TOI');
            $text_tu_khoa = self::viewShareVal('TEXT_Tu_Khoa');

            return view('Statics::content.pageServices',[
                'data' => $data,
                'text_dich_vu' => $text_dich_vu,
                'arrSame' => $arrSame,
                'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
                'text_san_pham_noi_bat' => $text_san_pham_noi_bat,
                'text_tu_khoa' => $text_tu_khoa,
            ]);
        }
    }

    public function pageProject(){

        $cat_finish   = (int)strip_tags(self::viewShareVal('CAT_ID_DUANTHUCHIEN'));
        $data_finish  = [];
        if ($data_finish  > 0){
            $data_search_finish ['statics_catid'] = $cat_finish ;
            $data_search_finish ['statics_order_no'] = 'asc';
            $data_finish  = Statics::getFocus($data_search_finish, $limit = 10);
        }
        $dataCate = Category::getById($cat_finish);

        $text_dich_vu = self::viewShareVal('TEXT_DICH_VU');
        $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');
        $text_tu_khoa = self::viewShareVal('TEXT_Tu_Khoa');
        $text_post = self::viewShareVal('TEXT_POST');
        $text_by = self::viewShareVal('TEXT_BY');
        $text_continue = self::viewShareVal('TEXT_CONTINUE');
        $text_post_in = self::viewShareVal('TEXT_POSTIN');
        $text_comment = self::viewShareVal('TEXT_COMMENT');

        return view('Statics::content.pageProject',[
            'dataCate' => $dataCate,
            'data_finish' => $data_finish,
            'text_dich_vu' => $text_dich_vu,
            'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
            'text_tu_khoa' => $text_tu_khoa,
            'text_post' => $text_post,
            'text_by' => $text_by,
            'text_continue' => $text_continue,
            'text_post_in' => $text_post_in,
            'text_comment' => $text_comment,
        ]);
    }

    public function pageCompany(){
        $text_gioi_thieu_cong_ty = self::viewShareVal('TEXT_INTRODUCE_COMPANY');
        $text_dvct = self::viewShareVal('TEXT_DICH_VU_CONG_TY');
        $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');

        return view('Statics::content.pageCompany',[
            'text_gioi_thieu_cong_ty' => $text_gioi_thieu_cong_ty,
            'text_dvct' => $text_dvct,
            'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
        ]);
    }

    public function pageLibrary(){
        return view('Statics::content.pageLibrary');
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
        foreach ($dataSearch as $item){
            if($item->statics_id > 0 && isset($item->statics_id)){
                $catId = $item->statics_id;
                $dataCate = Statics::getById($catId);

            }
        }
        $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';

        if (isset($dataCate)){

            $text_dich_vu = self::viewShareVal('TEXT_DICH_VU');
            $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');
            $text_tu_khoa = self::viewShareVal('TEXT_Tu_Khoa');
            $text_continue = self::viewShareVal('TEXT_CONTINUE');
            $text_post_in = self::viewShareVal('TEXT_POSTIN');
            $text_comment = self::viewShareVal('TEXT_COMMENT');

            return view('Statics::content.pageSearch',[
                'data' => $dataSearch,
                'search' => $search,
                'dataCate' => $dataCate,
                'paging' => $paging,
                'text_dich_vu' => $text_dich_vu,
                'text_tu_khoa' => $text_tu_khoa,
                'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
                'text_continue' => $text_continue,
                'text_post_in' => $text_post_in,
                'text_comment' => $text_comment
            ]);
        }
        else{
            $text_dich_vu = self::viewShareVal('TEXT_DICH_VU');
            $text_lien_he_voi_chung_toi = self::viewShareVal('TEXT_LIEN_HE_VOI_CHUNG_TOI');
            $text_tu_khoa = self::viewShareVal('TEXT_Tu_Khoa');

            return view('Statics::content.pageSearch',[
                'data' => $dataSearch,
                'search' => $search,
                'paging' => $paging,
                'text_dich_vu' => $text_dich_vu,
                'text_tu_khoa' => $text_tu_khoa,
                'text_lien_he_voi_chung_toi' => $text_lien_he_voi_chung_toi,
            ]);
        }
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

    public function pageProPor($catname, $catid){

        $arrCategory = Category::getAllCategory(0, array(), 0);
    
        return view('Statics::content.product_portfolio',[
            'arrCategory' => $arrCategory,
        ]);
    }

    public function pageProductDetail($name = '', $id = 0){

        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit  =12;
        $offset = ($pageNo - 1)* $limit;
        $total = 0;
        $data = $search = $dataCate = array();
        $paging = '';

        if ($id > 0){
            $search['product_cat_name'] = $name;
            $search['product_catid'] = $id;
            $search['product_min'] = (int)Request::get('min', -1);
            $search['product_max'] = (int)Request::get('max', -1);
            
            $search['product_status'] = CGlobal::status_show;
            $search['field_get'] = 'product_id,product_catid,product_cat_name,product_cat_alias,product_title,product_intro,product_content,product_image,product_created,product_price';
            $data  = Product::searchByCondition($search, $limit, $offset, $total);
            $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';
            $dataCate = Category::getById($id);
        }
     
        $size = Product::groupBy('product_size')->selectRaw('count(*) as total, product_size')->get();

        $color = Product::groupBy('product_color')->selectRaw('count(*) as total, product_color')->get();
  



        return view('Statics::content.productDetail',[
            'data' => $data,
            'dataCate' => $dataCate,
            'paging' => $paging,
            'size' => $size,
            'color' => $color,

        ]);
        }
    public function pageProduct($name = '' , $id = 0){
        $data = $dataCate = $dataSame =  array();

        if($id > 0){
            $data = Product::getById($id);
            $dataCate = Category::getById($data->product_catid);
        }
        $searchSame['field_get'] = 'product_id,product_catid,product_cat_name,product_cat_alias,product_title,product_intro,product_content,product_image,product_created,product_price';
        $dataSame = Product::getSameData($id, $data->product_catid, $limit = 6, $searchSame);

        return view('Statics::content.pageProduct',[
           'data' => $data,
            'dataSame' => $dataSame
        ]);
    }

    public function pageSearchSize(){

        $dataSize = Request::get('dataSize');
        if(!empty($dataSize)){

            $pageNo = (int) Request::get('page', 1);
            $pageScroll = CGlobal::num_scroll_page;
            $limit = CGlobal::num_record_per_page;
            $offset = ($pageNo - 1) * $limit;
            $search = $data = array();
            $total = 0;

            $search['product_size'] = $dataSize;
            $dataSearch = Product::searchByCondition($search, $limit, $offset, $total);
        }
        $output = '<div class="row">';
        foreach($dataSearch as $item)
        {
            $output .= '<div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src=" '. ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item["product_id"], $item["product_image"], 2000,0, "", true, true, false).'  " />
                                    </div>
                                    <div class="nd">
                                        <a title="{{$item->product_title}}" href="{{FuncLib::buildLinkProduct($item->product_id, $item->product_title)}}">
                                            <p class="name">'.stripslashes($item->product_title).'</p>
                                        </a>
                                        <p class="price">'.FuncLib::numberFormat($item->product_price).'₫</p>
                                    </div>
                                </div>
                            </div>';
        }


        $output .= '</div>';
        return $output;

    }
    public function pageSearchColor(){

        $dataColor = Request::get('dataColor');
        if(!empty($dataColor)){

            $pageNo = (int) Request::get('page', 1);
            $pageScroll = CGlobal::num_scroll_page;
            $limit = CGlobal::num_record_per_page;
            $offset = ($pageNo - 1) * $limit;
            $search = $data = array();
            $total = 0;

            $search['product_color'] = $dataColor;
            $dataSearch = Product::searchByCondition($search, $limit, $offset, $total);
        }

        $output = '<div class="row">';
        foreach($dataSearch as $item)
        {
            $output .= '<div class="col-md-4">
                                <div class="sp">
                                    <div class="img">
                                        <img src=" '. ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $item["product_id"], $item["product_image"], 2000,0, "", true, true, false).'  " />
                                    </div>
                                    <div class="nd">
                                        <a title="{{$item->product_title}}" href="{{FuncLib::buildLinkProduct($item->product_id, $item->product_title)}}">
                                            <p class="name">'.stripslashes($item->product_title).'</p>
                                        </a>
                                        <p class="price">'.FuncLib::numberFormat($item->product_price).'₫</p>
                                    </div>
                                </div>
                            </div>';
        }


        $output .= '</div>';
        return $output;

    }
    public function pageCart(){

        $pnum = Request::get('product_num');
        $pid = Request::get('product_id');

        if($pid > 0 && $pnum > 0){
            $result = Product::getById($pid);

            if(Session::has('cart')){
                $data = Session::get('cart');
                $data[$pid]['title'] = $result->product_title;
                $data[$pid]['image'] = $result->product_image;
                $data[$pid]['price'] = $result->product_price;
                $data[$pid]['id'] = $result->product_id;

                if(isset($data[$pid]['num'])){
                    $data[$pid]['num'] += $pnum;
                }else{
                    $data[$pid]['num'] = $pnum;
                }
            }else{
                $data[$pid]['title'] = $result->product_title;
                $data[$pid]['image'] = $result->product_image;
                $data[$pid]['price'] = $result->product_price;
                $data[$pid]['id'] = $result->product_id;
                $data[$pid]['num'] = $pnum;
            }

            Session::put('cart', $data, 60*24);


        }
        Session::save();
        $info = Session::get('cart');

        return view('Statics::content.pageCart',[
            'info' => $info,
        ]);
    }
    public function updateCart(){
        $number = Request::get('number');
        $data = Session::get('cart');


        foreach ($data as $item)
        {
            $i=$item['id'];
            foreach ($number as $id => $qtt)
            {
                if($item['id'] == $id)
                {
                    $data[$i]['num'] = $qtt;
                }
            }

        }
        Session::put('cart', $data, 60*24);
        Session::save();

        $info = Session::get('cart');

        return view('Statics::content.pageCart',[
            'info' => $info,
        ]);


    }
    public function deleteCart(){
        
        $id = Request::get('pid');
        if($id > 0 ){
            if(Session::has('cart')){
                $data = Session::get('cart');
                if(isset($data[$id]))
                {
                    unset($data[$id]);
                }


                Session::put('cart', $data, 60*24);
                Session::save();
            }
        }
        exit();


    }
    public function pagePay(){
        $info = Session::get('cart');
        $total_price = Request::get('total_price');

        return view('Statics::content.pagePay',[
            'info' => $info,
            'total_price' => $total_price,
        ]);
    }
    function str_rand($len) {
        $str = '';
        $times = ceil($len/32);
        for ($i = 0; $i < $times; $i++) {
            $str .= md5(rand());
        }
        return substr($str, 0, $len);
    }
    public function pageOrder(){
        if (!empty($_POST)){
            $orders_code = $this->str_rand(5);
            $customer_name = Request::get('ho') . ' ' . Request::get('ten');
            $customer_address = Request::get('country') . ' ' . Request::get('address') . Request::get('city') . Request::get('town');
            $customer_phone = Request::get('phone');

            $customer_email = Request::get('email');
            $total_price = Request::get('total_price');
            $orders_detail = serialize(Session::get('cart'));
  
            $orders_created = time();

            if ($customer_name != '' && $customer_address != '' && $customer_phone > 0){
                $dataInput = array(
                    'orders_code' => $orders_code,
                    'customer_name' => $customer_name,
                    'customer_address' => $customer_address,
                    'customer_phone' => $customer_phone,
                    'customer_email' => $customer_email,
                    'orders_status' => 1,
                    'orders_detail' => $orders_detail,
                    'orders_price' => $total_price,
                    'orders_created' => $orders_created,
                );
                $query = Orders::addData($dataInput);
               

                if ($query > 0){
                    Utility::messages('messages', 'Cảm ơn bạn đã đăng ký. Chúng tôi sẽ liên hệ với bạn sớm nhất');
                    Session::forget('cart');
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