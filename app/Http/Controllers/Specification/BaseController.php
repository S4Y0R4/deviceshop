<?php 

namespace App\Http\Controllers\Specification;

use App\Http\Controllers\Controller;
use App\Services\Specification\Service;


class BaseController extends Controller{

    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
    
}