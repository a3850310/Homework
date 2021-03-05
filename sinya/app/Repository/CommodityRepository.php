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
}