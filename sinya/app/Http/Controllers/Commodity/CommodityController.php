<?php

namespace App\Http\Controllers\Commodity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CommodityRepository;

class CommodityController extends Controller
{
    protected $CommodityRepository;

    function __construct(CommodityRepository $CommodityRepository)
    {
        $this->CommodityRepository = $CommodityRepository;
    }

    public function getInfo(Request $Request)
    {
        $page = $Request->page;

        $result = $this->CommodityRepository->getCommodityInfo($page);

        return $result;
    }
}
