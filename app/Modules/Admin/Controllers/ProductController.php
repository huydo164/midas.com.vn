<?php
namespace App\Modules\Admin\Controllers;

use App\Library\PHPDev\FuncLib;
use App\Modules\Models\Product;
use App\Modules\Models\Tag;
use App\Modules\Models\TagProduct;
use App\Modules\Models\TagStatics;
use App\Modules\Models\Type;
use App\Modules\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Loader;
use App\Library\PHPDev\Pagging;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ValidForm;
use App\Library\PHPDev\ThumbImg;

class ProductController extends BaseAdminController{

    private $arrStatus = array(-1 => 'Chọn', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');
    private $arrFocus = array(-1 => 'Chọn', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');
    private $arrCate = array(-1=>'Chọn danh mục cha');
    private $strCategoryProduct = '';
    private $error = '';
    public function __construct(){
        parent::__construct();
        Loader::loadJS('backend/js/admin.js', CGlobal::$postEnd);
        Loader::loadCSS('libs/upload/cssUpload.css', CGlobal::$postHead);
        Loader::loadJS('libs/upload/jquery.uploadfile.js', CGlobal::$postEnd);
        Loader::loadJS('backend/js/upload-admin.js', CGlobal::$postEnd);
        Loader::loadJS('libs/dragsort/jquery.dragsort.js', CGlobal::$postHead);
        Loader::loadCSS('libs/jAlert/jquery.alerts.css', CGlobal::$postHead);
        Loader::loadJS('libs/jAlert/jquery.alerts.js', CGlobal::$postEnd);

        $typeId = Type::getIdByKeyword('group_product');
        $this->arrCate = CategoryController::getArrCategory($typeId);
    }
    public function listView(){

        //Config Page
        $pageNo = (int) Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit = CGlobal::num_record_per_page;
        $offset = ($pageNo - 1) * $limit;
        $search = $data = array();
        $total = 0;

        $search['product_catid'] = (int)Request::get('product_catid', -1);
        $search['product_title'] = addslashes(Request::get('product_title', ''));
        $search['product_status'] = (int)Request::get('product_status', -1);
        $search['product_focus'] = (int)Request::get('product_focus', -1);
        $search['submit'] = (int)Request::get('submit', 0);
        $search['field_get'] = '';

        $dataSearch = Product::searchByCondition($search, $limit, $offset, $total);
        $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';

        $optionStatus = Utility::getOption($this->arrStatus, $search['product_status']);
        $optionFocus = Utility::getOption($this->arrFocus, $search['product_focus']);

        $messages = Utility::messages('messages');
        $typeId = Type::getIdByKeyword('group_product');
        $this->strCategoryProduct = CategoryController::createOptionCategory($typeId, isset($search['product_catid']) ? $search['product_catid'] : 0);


        return view('Admin::product.list',[
            'data'=>$dataSearch,
            'total'=>$total,
            'paging'=>$paging,
            'arrStatus'=>$this->arrStatus,
            'optionStatus'=>$optionStatus,
            'optionFocus'=>$optionFocus,
            'arrCate'=>$this->arrCate,
            'strCategoryProduct'=>$this->strCategoryProduct,
            'search'=>$search,
            'messages'=>$messages,
        ]);
    }
    public function getItem($id=0){

        Loader::loadJS('libs/ckeditor/ckeditor.js', CGlobal::$postHead);

        $data = array();
        $product_image = '';
        $product_image_other = array();
        $arrTag = array();

        if($id > 0) {
            $data = product::getById($id);
            if($data != null){
                if($data->product_image_other != ''){
                    $productImageOther = unserialize($data->product_image_other);
                    if(!empty($productImageOther)){
                        foreach($productImageOther as $k=>$v){
                            $url_thumb = ThumbImg::thumbBaseNormal(CGlobal::FOLDER_PRODUCT, $id, $v, 400, 400, '', true, true);
                            $product_image_other[] = array('img_other'=>$v,'src_img_other'=>$url_thumb);
                        }
                    }
                }
                //Main Img
                $product_image = trim($data->product_image);
            }

        }

        $arrTag = Tag::getAllTag(array(), $limit = 0);

        $optionStatus = Utility::getOption($this->arrStatus, isset($data['product_status'])? $data['product_status'] : CGlobal::status_show);
        $optionFocus = Utility::getOption($this->arrFocus, isset($data['product_focus'])? $data['product_focus'] : CGlobal::status_hide);
        $typeId = Type::getIdByKeyword('group_product');
        $this->strCategoryProduct = CategoryController::createOptionCategory($typeId, isset($data['product_catid'])? $data['product_catid'] : 0);

        return view('Admin::product.add',[
            'id'=>$id,
            'data'=>$data,
            'arrTag' => $arrTag,
            'optionStatus'=>$optionStatus,
            'optionFocus'=>$optionFocus,
            'news_image'=>$product_image,
            'news_image_other'=>$product_image_other,
            'optionCategoryProduct'=>$this->strCategoryProduct,
            'error'=>$this->error,
        ]);

    }
    public function postItem($id=0){

        Loader::loadJS('libs/ckeditor/ckeditor.js', CGlobal::$postHead);

        $id_hiden = (int)Request::get('id_hiden', 0);
        $data = array();

        $dataSave = array(
            'product_title'=>array('value'=>addslashes(Request::get('product_title')), 'require'=>1, 'messages'=>'Tiêu đề không được trống!'),
            'product_catid'=>array('value'=>(int)(Request::get('product_catid')),'require'=>0),
            'product_intro'=>array('value'=>addslashes(Request::get('product_intro')),'require'=>0),
            'product_content'=>array('value'=>addslashes(Request::get('product_content')),'require'=>0),
            'product_price'=>array('value'=>(double)(Request::get('product_price')),'require'=>0),
            'product_size'=>array('value'=>(int)(Request::get('product_size')),'require'=>0),
            'product_color'=>array('value'=>addslashes(Request::get('product_color')),'require'=>0),
            'product_order_no'=>array('value'=>(int)addslashes(Request::get('product_order_no')),'require'=>0),
            'product_created'=>array('value'=>time()),
            'product_status'=>array('value'=>(int)Request::get('product_status', -1),'require'=>0),
            'product_focus'=>array('value'=>(int)Request::get('product_focus', -1),'require'=>0),
            'meta_title'=>array('value'=>addslashes(Request::get('meta_title')),'require'=>0),
            'meta_keywords'=>array('value'=>addslashes(Request::get('meta_keywords')),'require'=>0),
            'meta_description'=>array('value'=>addslashes(Request::get('meta_description')),'require'=>0),
            'product_tag' => array('value' => Request::get('product_tag', []), 'require' => 0)
        );

        //get product_cat_name, product_cat_alias
        if(isset($dataSave['product_catid']['value']) && $dataSave['product_catid']['value'] > 0){
            $arrCat = Category::getById($dataSave['product_catid']['value']);
            if($arrCat != null){
                $dataSave['product_cat_name']['value'] = $arrCat->category_title;
                $dataSave['product_cat_alias']['value'] = $arrCat->category_title_alias;
            }
        }

        $product_tag = $dataSave['product_tag']['value'];
        $dataSave['product_tag']['value'] = json_encode($product_tag);

        //Main Img
        $image_primary = addslashes(Request::get('image_primary', ''));
        //Other Img
        $arrInputImgOther = array();
        $getImgOther = Request::get('img_other',array());
        if(!empty($getImgOther)){
            foreach($getImgOther as $k=>$val){
                if($val !=''){
                    $arrInputImgOther[] = $val;
                }
            }
        }
        if(!empty($arrInputImgOther) && count($arrInputImgOther) > 0) {
            //Neu Ko chon Anh Chinh, Lay Anh Chinh La Cai Dau Tien
            $dataSave['product_image']['value'] = ($image_primary != '') ? $image_primary : $arrInputImgOther[0];
            $dataSave['product_image_other']['value'] = serialize($arrInputImgOther);
            
        }

        if($id > 0){
            unset($dataSave['product_created']);
        }

        $this->error = ValidForm::validInputData($dataSave);
        if($this->error == ''){
            $id = ($id == 0) ? $id_hiden : $id;
            $id = Product::saveData($id, $dataSave);
            if ($id > 0){
                TagStatics::where('product_id', $id)->delete();
                foreach($product_tag as $key => $item){
                    $tmp = [
                        'tag_id' => $key,
                        'product_id' => $id,
                    ];
                    TagStatics::create($tmp);
                }
            }
            return Redirect::route('admin.product');
        }else{
            foreach($dataSave as $key=>$val){
                $data[$key] = $val['value'];
            }
        }
        $optionStatus = Utility::getOption($this->arrStatus, isset($data['product_status'])? $data['product_status'] : -1);
        $optionFocus = Utility::getOption($this->arrFocus, isset($data['product_focus'])? $data['product_focus'] : CGlobal::status_hide);
        $typeId = Type::getIdByKeyword('group_product');
        $this->strCategoryProduct = CategoryController::createOptionCategory($typeId, isset($data['product_catid'])? $data['product_catid'] : 0);

        return view('Admin::product.add',[
            'id'=>$id,
            'data'=>$data,
            'optionStatus'=>$optionStatus,
            'optionFocus'=>$optionFocus,
            'news_image'=>$image_primary,
            'news_image_other'=>$arrInputImgOther,
            'optionCategoryProduct'=>$this->strCategoryProduct,
            'error'=>$this->error,
        ]);
    }
    public function delete(){

        $listId = Request::get('checkItem', array());
        $token = Request::get('_token', '');
        if(Session::token() === $token){
            if(!empty($listId) && is_array($listId)){
                foreach($listId as $id){
                    Product::deleteId($id);
                }
                Utility::messages('messages', 'Xóa thành công!', 'success');
            }
        }
        return Redirect::route('admin.product');
    }

}