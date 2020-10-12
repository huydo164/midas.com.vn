<?php
/*
* @Created by: DUYNX
* @Author    : nguyenduypt86@gmail.com
* @Date      : 06/2016
* @Version   : 1.0
*/
namespace App\Modules\Models;

use App\Library\PHPDev\CDatabase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
use App\Library\PHPDev\Memcache;
use App\Library\PHPDev\Utility;
use PDOException;

class Product extends Model {

    protected $table = 'product';
    protected $primaryKey = 'product_id';
    public  $timestamps = false;

    protected $fillable = array(
        'product_id', 'product_catid', 'product_cat_name', 'product_cat_alias', 'product_title', 'product_intro', 'product_content', 'product_price', 'product_size', 'product_color' , 'product_view_num',
        'product_image', 'product_image_other', 'product_created', 'product_order_no', 'product_focus', 'product_status', 'product_word', 'meta_title', 'meta_keywords', 'meta_description');

    public static function searchByCondition($dataSearch=array(), $limit=0, $offset=0, &$total){
        try{

            $query = Product::where('product_id','>',0);

            if (isset($dataSearch['product_title']) && $dataSearch['product_title'] != '') {
                $query->where('product_title','LIKE', '%' . $dataSearch['product_title'] . '%');
            }
            if (isset($dataSearch['product_status']) && $dataSearch['product_status'] != -1) {
                $query->where('product_status', $dataSearch['product_status']);
            }

            if(isset($dataSearch['product_catid']) && $dataSearch['product_catid'] != -1){
                $catid = $dataSearch['product_catid'];
                $arrCat = array($catid);
                Category::makeListCatId($catid, 0, $arrCat);
                if(is_array($arrCat) && !empty($arrCat)){
                    $query->whereIn('product_catid', $arrCat);
                }
            }

            $total = $query->count(['product_id']);
            $query->orderBy('product_id', 'asc');

            $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
            if(!empty($fields)){
                $result = $query->take($limit)->skip($offset)->get($fields);
            }else{
                $result = $query->take($limit)->skip($offset)->get();
            }
            return $result;

        }catch (PDOException $e){
            throw new PDOException();
        }
    }

    public static function getById($id=0){
        
        $result = (Memcache::CACHE_ON) ? Cache::get(Memcache::CACHE_PRODUCT_ID.$id) : array();
        try {
            if(empty($result)){
                $result = Product::where('product_id', $id)->first();
                if($result && Memcache::CACHE_ON){
                    Cache::put(Memcache::CACHE_PRODUCT_ID.$id, $result, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            }
        } catch (PDOException $e) {
            throw new PDOException();
        }

        return $result;
    }

    public static function updateData($id=0, $dataInput=array()){
        try {
            DB::connection()->getPdo()->beginTransaction();
            $data = Product::getById($id);
            if($id > 0 && !empty($dataInput)){ 
 
                $data->update($dataInput);               
                if(isset($data->product_id) && $data->product_id > 0){
                    self::removeCacheId($data->product_id);
                    self::removeCacheCatId($data->product_catid);
                }
            }
            DB::connection()->getPdo()->commit();
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function addData($dataInput=array()){
        try {
            DB::connection()->getPdo()->beginTransaction();
            $data = new Product();
            if (is_array($dataInput) && count($dataInput) > 0) {
                foreach ($dataInput as $k => $v) {
                    $data->$k = $v;
                }
            }
        
            if ($data->save()) {
                DB::connection()->getPdo()->commit();
                if($data->product_id && Memcache::CACHE_ON){
                    Product::removeCacheId($data->product_id);
                    self::removeCacheCatId($data->product_catid);
                }
                return $data->product_id;
            }

            DB::connection()->getPdo()->commit();
            return false;
        } catch (PDOException $e) {

            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function saveData($id=0, $data=array()){
        $data_post = array();
        if(!empty($data)){
            foreach($data as $key=>$val){
                $data_post[$key] = $val['value'];
            }
        }
        
        if($id > 0){
 
            Product::updateData($id, $data_post);
            Utility::messages('messages', 'Cập nhật thành công!');
        }else{

            Product::addData($data_post);
            Utility::messages('messages', 'Thêm mới thành công!');
        }

    }

    public static function deleteId($id=0){
        try {
            DB::connection()->getPdo()->beginTransaction();
            $data = Product::find($id);
            if($data != null){

                //Remove Img
                $product_image_other = ($data->product_image_other != '') ? unserialize($data->product_image_other) : array();
                if(is_array($product_image_other) && !empty($product_image_other)){
                    $path = Config::get('config.DIR_ROOT').'uploads/'.CGlobal::FOLDER_product.'/'.$id;
                    foreach($product_image_other as $v){
                        if(is_file($path.'/'.$v)){
                            @unlink($path.'/'.$v);
                        }
                    }
                    if(is_dir($path)) {
                        @rmdir($path);
                    }
                }
                //End Remove Img
                $data->delete();
                if(isset($data->product_id) && $data->product_id > 0){
                    self::removeCacheId($data->product_id);
                    self::removeCacheCatId($data->product_catid);
                }
                DB::connection()->getPdo()->commit();
            }
            return true;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function removeCacheId($id=0){
        if($id>0){
            Cache::forget(Memcache::CACHE_PRODUCT_ID.$id);
        }
    }

    public static function removeCacheCatId($catid=0){
        if($catid>0){
            Cache::forget(Memcache::CACHE_PRODUCT_CAT_ID.$catid);
        }
    }

    public static function searchByConditionCatid($catid=0, $limit=0, $dataSearch=array()){
        $result = (Memcache::CACHE_ON) ? Cache::get(Memcache::CACHE_PRODUCT_CAT_ID.$catid) : array();
        try{
            if(empty($result)){
                $query = Product::where('product_id','>',0);
                $query->where('product_status','=',CGlobal::status_show);
                if($catid != -1){
                    $arrCat = array($catid);
                    Category::makeListCatId($catid, 0, $arrCat);
                    if(is_array($arrCat) && !empty($arrCat)){
                        $query->whereIn('product_catid', $arrCat);
                    }
                }
                $query->orderBy('product_order_no', 'asc');

                if($limit > 0){
                    $query->take($limit);
                }
                $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
                if(!empty($fields)){
                    $result = $query->take($limit)->get($fields);
                }else{
                    $result = $query->take($limit)->get();
                }

                if($result && Memcache::CACHE_ON){
                    Cache::put(Memcache::CACHE_PRODUCT_CAT_ID.$catid, $result, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            }
            return $result;
        }catch (PDOException $e){
            throw new PDOException();
        }
    }

    public static function getFocus($dataSearch=array(), $limit=10){
        $result = array();
        try{
            if($limit > 0){
                $query = Product::where('product_id','>', 0);
                $query->where('product_focus', CGlobal::status_show);
                $query->where('product_status', CGlobal::status_show);


                if(isset($dataSearch['product_catid']) && $dataSearch['product_catid'] != 0){
                    $query->where('product_catid', $dataSearch['product_catid']);
                }

                if(isset($dataSearch['product_order_no']) && $dataSearch['product_order_no'] == 'asc'){
                    $query->orderBy('product_order_no', 'asc');
                }else{
                    $query->orderBy('product_id', 'desc');
                }

                $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
                if(!empty($fields)){
                    $result = $query->take($limit)->get($fields);
                }else{
                    $result = $query->take($limit)->get();
                }
                
            }

        }catch (PDOException $e){
            throw new PDOException();
        }
        return $result;
    }

    public static function getSameData($id, $catId, $limit=10, $dataSearch=array()){
        $result = array();
        try{
            if($limit > 0){
                $query = Product::where('product_id','>', 0);
                $query->where('product_status', CGlobal::status_show);
                $query->where('product_id','<>', $id);
                $query->where('product_catid', $catId);
                $query->orderBy('product_id', 'desc');
                $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',',trim($dataSearch['field_get'])): array();
                $result = $query->take($limit)->get($fields);
            }

        }catch (PDOException $e){
            throw new PDOException();
        }
        return $result;
    }
}
