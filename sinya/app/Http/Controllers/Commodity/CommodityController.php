<?php

namespace App\Http\Controllers\Commodity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Commodity\grtInfoCollection;
use App\Repository\CommodityRepository;
use App\Repository\BrandRepository;

class CommodityController extends Controller
{
    protected $CommodityRepository;
    protected $BrandRepository;

    function __construct(
        CommodityRepository $CommodityRepository,
        BrandRepository $BrandRepository
    )
    {
        $this->CommodityRepository = $CommodityRepository;
        $this->BrandRepository = $BrandRepository;
    }

    /**
     * 獲取商品資訊
     * 
     * @param int page 頁數
     * @param array brand 廠牌
     * @param int min_price 最低價格
     * @param int max_price 最高價格
     */
    public function getInfo(Request $request)
    {
        $page = $request->page;
        $brand = (array)json_decode($request->brand);
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $row = 8;

        //獲取所有廠牌
        $type = $this->BrandRepository->getAllBrand();
        //若廠牌為空 賦予資料庫全部值
        if (empty($brand)) {
            $brand = $type->pluck("BrandName")->toArray();
        }

        //獲取商品資訊的 builder
        $builder = $this->CommodityRepository->getCommodityInfoBulider($page, $brand, $min_price, $max_price);
        //計算商品總數算取頁數
        $total_commodity = ceil($builder->get()->count()/8);
        //獲取商品資訊的結果，並做分頁(一頁8筆)
        $result = $builder->take($row)->skip($row*($page-1))->get();

        return view('commodity',['commodity' => $result,'total' => $total_commodity,'type' => $type,'page' => $page, 'min_price' => $min_price, 'max_price' => $max_price, 'brand' => $brand]);
    }
}
