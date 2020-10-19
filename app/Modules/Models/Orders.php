<?php
namespace App\Modules\Models;

use App\Library\PHPDev\CDatabase;
use App\Library\PHPDev\FuncLib;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Memcache;
use App\Library\PHPDev\Utility;
use PDOException;

class Orders extends Model {

    protected $table = CDatabase::orders;
    protected $primaryKey = 'orders_id';
    public  $timestamps = false;

    protected $fillable = array(
        'orders_id', 'customer_name' ,'customer_phone','customer_email' , 'customer_address' , 'orders_created' ,  'orders_updated', 'orders_date_recive', 'orders_price' , 'orders_status', 'orders_detail');
    //ADMIN
    public static function searchByCondition($dataSearch=array(), $limit=0, $offset=0, &$total){
        try{

            $query = Orders::where('orders_id','>',0);

            if (isset($dataSearch['orders_code']) && $dataSearch['orders_code'] != '') {
                $query->where('orders_code','LIKE', '%' . $dataSearch['orders_code'] . '%');
            }
            if (isset($dataSearch['orders_status']) && $dataSearch['orders_status'] != -1) {
                $query->where('orders_status', $dataSearch['orders_status']);
            }

            $total = $query->count();


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

    public static function getAllProduct(){
        try{

            $query = Product::where('product_id','>',0);

            return $query;

        }catch (PDOException $e){
            throw new PDOException();
        }
    }

    public static function getById($id=0){
        $result = (Memcache::CACHE_ON) ? Cache::get(Memcache::CACHE_ORDERS_ID.$id) : array();
        try {
            if(empty($result)){
                $result = orders::where('orders_id', $id)->first();
                if($result && Memcache::CACHE_ON){
                    Cache::put(Memcache::CACHE_ORDERS_ID.$id, $result, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
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
            $data = orders::find($id);
            if($id > 0 && !empty($dataInput)){
                $data->update($dataInput);
                if(isset($data->orders_id) ){
                    self::removeCacheId($data->orders_id);
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
            $data = new Orders();
            if (is_array($dataInput) && count($dataInput) > 0) {
                foreach ($dataInput as $k => $v) {
                    $data->$k = $v;
                }
            }
            
            if ($data->save()) {
                DB::connection()->getPdo()->commit();
                if($data->orders_id && Memcache::CACHE_ON){
                    orders::removeCacheId($data->orders_id);
                }

                return $data->orders_id;
            }
            DB::connection()->getPdo()->commit();
            return false;
        } catch (PDOException $e) {
            DB::connection()->getPdo()->rollBack();
            throw new PDOException();
        }
    }

    public static function saveData($id= "", $data=array()){
        $data_post = array();
        if(!empty($data)){
            foreach($data as $key=>$val){
                $data_post[$key] = $val['value'];
            }
        }
        if($id > 0){
            Orders::updateData($id, $data_post);
            Utility::messages('messages', 'Cập nhật thành công!');
        }else{
            Orders::addData($data_post);
            Utility::messages('messages', 'Thêm mới thành công!');
        }

    }

    public static function deleteId($id=0){
        try {
            DB::connection()->getPdo()->beginTransaction();
            $data = Orders::find($id);
            if($data != null){


                $data->delete();
                if(isset($data->orders_id) ){
                    self::removeCacheId($data->orders_id);
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
            Cache::forget(Memcache::CACHE_ORDERS_ID.$id);
        }
    }


}
