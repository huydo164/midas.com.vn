<?php
namespace App\Modules\Admin\Controllers;

use App\Library\PHPDev\FuncLib;
use App\Modules\Models\Orders;
use App\Modules\Models\Product;
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

class OrdersController extends BaseAdminController{


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

        $typeId = Type::getIdByKeyword('group_static');
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

        $search['orders_id'] = addslashes(Request::get('orders_id', ''));

        $search['submit'] = (int)Request::get('submit', 0);
        $search['field_get'] = '';

        $dataSearch = Orders::searchByCondition($search, $limit, $offset, $total);
        $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';

    
   

        $messages = Utility::messages('messages');
   

        return view('Admin::orders.list',[
            'data'=>$dataSearch,
            'total'=>$total,
            'paging'=>$paging,


 
  
            'search'=>$search,
            'messages'=>$messages,
        ]);
    }
    public function getItem($id=0){

        Loader::loadJS('libs/ckeditor/ckeditor.js', CGlobal::$postHead);

        $data = array();

        if($id > 0) {
            $data = Orders::getById($id);
        }

        $product = Orders::getAllProduct();





        return view('Admin::orders.add',[
            'id'=>$id,
            'data'=>$data,


            'error'=>$this->error,
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
    public function postItem($id=0){


        $id_hiden = (int)Request::get('id_hiden', 0);
        $data = array();

        $data = Orders::getById($id_hiden);

        if(strlen($data['orders_detail']) > 0 )
        {
            $data_details = unserialize($data['orders_detail']);
            $total_price = 0;
            foreach ($data_details as $item)
            {
                $id_pro = $item['id'];
                $request = 'number_'.$id_pro;
                $num = Request::get($request);
                $data_details[$id_pro]['num'] = $num;
                $total_price += $num * $data_details[$id_pro]['price'] ;
            }
            $orders_detail = serialize($data_details);
        }
        else
        {
            $total_price = 0 ;
            $orders_detail = '';
        }

        $dataSave = array(
            'orders_code'=>array('value'=>$this->str_rand(5), 'require'=>1, 'messages'=>'Tiêu đề không được trống!'),

            'customer_name'=>array('value'=>addslashes(Request::get('customer_name')),'require'=>0),
            'customer_phone'=>array('value'=>(int)(Request::get('customer_phone')),'require'=>0),
            'customer_email'=>array('value'=>addslashes(Request::get('customer_name')),'require'=>0),
            'orders_status'=>array('value'=>(int)(Request::get('orders_status')),'require'=>0),
            'customer_address'=>array('value'=>addslashes(Request::get('customer_address')),'require'=>0),
            'orders_price'=>array('value'=>(double)($total_price),'require'=>0),
            'orders_detail'=>array('value'=>$orders_detail,'require'=>0),
            


        );


        if($id > 0){
            unset($dataSave['orders_created']);
        }

        $this->error = ValidForm::validInputData($dataSave);
        if($this->error == ''){
            $id = ($id == 0) ? $id_hiden : $id;
            orders::saveData($id, $dataSave);
            return Redirect::route('admin.orders');
        }else{
            foreach($dataSave as $key=>$val){
                $data[$key] = $val['value'];
            }
        }

        $optionStatus = Utility::getOption($this->arrStatus, isset($data['orders_status'])? $data['orders_status'] : -1);


        return view('Admin::orders.add',[
            'id'=>$id,
            'data'=>$data,
            'optionStatus'=>$optionStatus,
            'error'=>$this->error,
        ]);
    }
    public function delete(){

        $listId = Request::get('checkItem', array());

        $token = Request::get('_token', '');
        if(Session::token() === $token){
            if(!empty($listId) && is_array($listId)){
                foreach($listId as $id){
                    Orders::deleteId($id);
                }
                Utility::messages('messages', 'Xóa thành công!', 'success');
            }
        }
        return Redirect::route('admin.orders_delete');
    }

}