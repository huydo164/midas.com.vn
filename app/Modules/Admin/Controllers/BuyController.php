<?php

namespace App\Modules\Admin\Controllers;

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Loader;
use App\Library\PHPDev\Pagging;
use App\Library\PHPDev\Utility;
use App\Library\PHPDev\ValidForm;
use App\Modules\Models\Buy;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class BuyController extends BaseAdminController{
    private $arrStatus = array(-1 => 'Chọn', CGlobal::status_hide => 'Ẩn', CGlobal::status_show => 'Hiện');
    private $error = '';

    public function __construct()
    {
        parent::__construct();
        Loader::loadJS('backend/js/admin.js', CGlobal::$postEnd);
        Loader::loadCSS('libs/jAlert/jquery.alerts.css', CGlobal::$postHead);
        Loader::loadJS('libs/jAlert/jquery.alerts.js', CGlobal::$postEnd);
    }

    public function listView(){
        $pageNo = (int)Request::get('page', 1);
        $pageScroll = CGlobal::num_scroll_page;
        $limit = CGlobal::num_record_per_page;
        $offset = ($pageNo - 1)*$limit;
        $total = 0;
        $search = $data = array();

        $search['buy_name'] = addslashes(Request::get('buy_name', ''));
        $search['buy_status'] = (int)Request::get('buy_status', -1);
        $search['field_get'] = '';
        $search['submit'] = (int)Request::get('submit', 0);

        $dataSearch = Buy::searchByCondition($search, $limit, $offset, $total);
        $paging = $total > 0 ? Pagging::getPager($pageScroll, $pageNo, $total, $limit, $search) : '';

        $optionStatus = Utility::getOption($this->arrStatus, $search['buy_status']);
        $messages = Utility::messages('messages');

        return view('Admin::Buy.list',[
            'data' => $dataSearch,
            'search' => $search,
            'total' => $total,
            'paging' => $paging,
            'optionStatus' => $optionStatus,
            'arrStatus' => $this->arrStatus,
            'messages' => $messages,
        ]);
    }

    public function getItem($id = 0){
        $data = array();

        if ($id > 0){
            $data = Buy::getById($id);
        }

        $optionStatus = Utility::getOption($this->arrStatus, isset($data['buy_status']) ? $data['buy_status'] : CGlobal::status_show);

        return view('Admin::buy.add',[
            'id' => $id,
            'data' => $data,
            'optionStatus' => $optionStatus,
            'error' => $this->error,
        ]);
    }

    public function postItem($id = 0){
        $data = array();
        $id_hiden = (int)Request::get('id_hiden', 0);

        $dataSave = array(
            'buy_name' => array('value' => addslashes(Request::get('buy_name')), 'require' => 1, 'messages' => 'Tên không được trống!'),
            'buy_phone' => array('value' => addslashes(Request::get('buy_phone')), 'require' => 0),
            'buy_email' => array('value' => addslashes(Request::get('buy_email')), 'require' => 0),
            'buy_content' => array('value' => addslashes(Request::get('buy_content')), 'require' => 0),
            'buy_created' => array('value' => time()),
            'buy_status' => array('value' => (int)Request::get('buy_status'), 'require' => 0),
        );

        if ($id > 0){
            unset($dataSave['buy_created']);
        }

        //Hiện lỗi
        $this->error = ValidForm::validInputData($dataSave);
        if ($this->error == ''){
            $id = ($id == 0) ? $id_hiden : $id;
            Buy::saveData($id, $dataSave);
            return Redirect::route('admin.buy');
        }
        else{
            foreach ($dataSave as $key => $value){
                $data[$key] = $value['value'];
            }
        }

        $optionStatus = Utility::getOption($this->arrStatus, isset($data['buy_status'])  ? $data['buy_status'] : -1);

        return view('Admin::buy.add',[
            'id' => $id,
            'data' => $data,
            'optionStatus' => $optionStatus,
            'error' => $this->error,
        ]);
    }

    public function delete(){
        $listId = Request::get('listId', array());
        $token = Request::get('_token', '');
        if (Session::token() === $token){
            if (is_array($listId) && !empty($listId)){
                foreach ($listId as $id){
                    Buy::deleteId($id);
                }
                Utility::messages('messages', 'Xóa thành công!', 'success');
            }
        }
        return Redirect::route('admin.buy');
    }
}
