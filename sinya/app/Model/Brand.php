<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'Brand';
    protected $primaryKey = 'BrandId'; 
    public $timestamps = false;

    public function Commodity() 
    {
        return $this->hasMany('Commodity', 'BrandId', 'BrandId');
    }
}
