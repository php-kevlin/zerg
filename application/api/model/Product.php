<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/3/14
 * Time: 12:20
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = [
      'delete_time','main_img_id','pivot','from','category_id','create_time','update_time'
    ];

    protected function getMainImgUrlAttr($value,$data)
    {
        return $this->prefixImgUrl($value,$data);
    }

    public static function getMostRecent($count)
    {
        $products =  self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }

    /*
     * 根据分类ID查询商品
     */
    public static function getProductsByCategoryId($CategoryID)
    {
        $products = self::where('category_id','=',$CategoryID)
            ->select();
        return $products;
    }





}