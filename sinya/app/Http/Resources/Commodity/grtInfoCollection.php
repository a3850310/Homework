<?php

namespace App\Http\Resources\Commodity;

use Illuminate\Http\Resources\Json\ResourceCollection;

class grtInfoCollection extends ResourceCollection
{
    function __construct($result)
    {
        $this->result = $result;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'code' => 001,
            'data' => [
                'result' => $this->result
            ]
        ];
    }
}
