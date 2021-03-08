<?php 

namespace App\Repository;

use DB;
use App\Model\Commodity;

class CommodityRepository
{
    /**
     * 注入的Commodity Model
     */
    protected $Commodity;

    public function __construct(Commodity $Commodity)
    {
        $this->Commodity = $Commodity;
    }

    /**
     * 獲取商品Bulider
     * 
     * @param int page 頁數
     * @param int row 筆數
     * @param array brand 廠牌
     * @param int min_price 最低價格
     * @param int max_price 最高價格
     */
    public function getCommodityInfoBulider(int $page, $brand, $min_price, $max_price)
    {
        $CommodityInfo = $this->Commodity
                        ->join("Brand","Brand.BrandId","=","Commodity.BrandId")
                        ->whereIn("Brand.BrandName", $brand)
                        ->where(function($query)use($min_price,$max_price){
                            if (isset($min_price) && isset($max_price)) {
                                $query->whereBetween("Commodity.CommodityRealPrice",[$min_price,$max_price]);
                            }
                        });

        return $CommodityInfo;
    }
}