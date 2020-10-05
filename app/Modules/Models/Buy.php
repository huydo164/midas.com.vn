<?php

namespace App\Modules\Models;

use App\Library\PHPDev\CDatabase;
use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\Memcache;
use App\Library\PHPDev\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use PDOException;

class Buy extends Model{
    protected $table = CDatabase::buy;
    protected $primaryKey = 'buy_id';
    public $timestamps = false;

    protected $fillable = [
        'buy_id', 'buy_name', 'buy_phone', 'buy_email', 'buy_content', 'buy_created', 'buy_status'
    ];

    public static function searchByCondition($dataSearch = array(), $limit = 0, $offset = 0, &$total){
        try {
            $query = Buy::where('buy_id', '>', 0);

            if (isset($dataSearch['buy_name']) && $dataSearch['buy_name'] != ''){
                $query->where('buy_name', 'LIKE', '%'.$dataSearch['buy_name']. '%');
            }
            if (isset($dataSearch['buy_status']) && $dataSearch['buy_status'] != -1){
                $query->where('buy_status', $dataSearch['buy_status']);
            }

            $total = $query->count(['buy_id']);
            $query->orderBy('buy_id', 'asc');

            $fields = (isset($dataSearch['field_get']) && trim($dataSearch['field_get']) != '') ? explode(',', trim($dataSearch['field_get'])) : array();
            if (!empty($fields)){
                $result = $query->take($limit)->skip($offset)->get($fields);
            }
            else{
                $result = $query->take($limit)->skip($offset)->get();
            }

            return $result;

        }catch (PDOException $e){
            throw new PDOException();
        }
    }

    public static function getById($id = 0){
        $result = (Memcache::CACHE_ON) ? Cache::get(Memcache::CACHE_BUY_ID.$id) : array();

        try {
            if ($id > 0){
                $result = Buy::where('buy_id', $id)->first();
                if ($result && Memcache::CACHE_ON){
                    Cache::put(Memcache::CACHE_BUY_ID.$id, $result, Memcache::CACHE_TIME_TO_LIVE_ONE_MONTH);
                }
            }
        }catch (PDOException $e){
            throw new PDOException();
        }

        return $result;
    }

    public static function updateData($id = 0, $dataInput = array() ){
        try {
            DB::connection()->getPdo()->beginTransaction();

            $data = Buy::getById($id);
            if ($id > 0 && !empty($dataInput)){
                $data->update($dataInput);
                if (isset($data->buy_id) && $data->buy_id > 0){
                    self::removeCacheId($data->buy_id);
                }
            }
            DB::connection()->getPdo()->commit();
            return true;

        }catch (PDOException $e){
            DB::connection()->getPdo()->rollback();
        }
    }

    public static function addData($dataInput = array()){
        try {
            DB::connection()->getPdo()->beginTransaction();

            $data = new Buy();
            if (is_array($dataInput) && count($dataInput) > 0){
                foreach ($dataInput as $k => $v){
                    $data->$k = $v;
                }
            }
            if ($data->save()){
                DB::connection()->getPdo()->commit();
                if ($data->buy_id && Memcache::CACHE_ON){
                    Buy::removeCacheId($data->buy_id);
                }
                return $data->buy_id;
            }
            DB::connection()->getPdo()->commit();
            return false;

        }catch (PDOException $e){
            DB::connection()->getPdo()->rollback();
            throw new PDOException();
        }
    }

    public static function saveData($id = 0, $data = array()){
        $data_post = array();

        if (!empty($data)){
            foreach ($data as $key => $val){
                $data_post[$key] = $val['value'];
            }
        }
        if ($id > 0){
            Buy::updateData($id, $data_post);
            Utility::messages('messages', 'Cập nhật thành công!');
        }
        else{
            Buy::addData($data_post);
            Utility::messages('messages', 'Thêm mới thành công!');
        }
    }

    public static function deleteId($id = 0){
        try {
            DB::connection()->getPdo()->beginTransaction();

            $data = Buy::find($id);
            if($data != null){
                $data->delete($id);
                if (isset($data->buy_id) && $data->buy_id > 0){
                    self::removeCacheId($data->buy_id);
                }
                DB::connection()->getPdo()->comit();
            }
            return true;

        }catch (PDOException $e){
            DB::connection()->getPdo()->rollback();
            throw new PDOException();
        }
    }

    public static function removeCacheId($id = 0 ){
        if ($id > 0){
            Cache::forget(Memcache::CACHE_BUY_ID.$id);
        }
    }
}