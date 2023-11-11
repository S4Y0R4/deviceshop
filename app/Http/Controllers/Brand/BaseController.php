<?php 

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Services\Brand\Service;


class BaseController extends Controller{

    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
    
}