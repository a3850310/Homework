<?php 

namespace App\Repository;

use DB;
use App\Model\Brand;

class BrandRepository
{
    /**
     * 注入的Brand Model
     */
    protected $Brand;

    public function __construct(Brand $Brand)
    {
        $this->Brand = $Brand;
    }

    public function getAllBrand()
    {
        return $this->Brand->all();
    }
}