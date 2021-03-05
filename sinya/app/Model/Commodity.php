<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $table = 'Commodity';
    protected $primaryKey = 'CommodityId'; 
    public $timestamps = false;

    public function Brand() 
    {
        return $this->belongsTo('Brand', 'BrandId', 'BrandId');
    }
}
