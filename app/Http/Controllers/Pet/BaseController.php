<?php

namespace App\Http\Controllers\Pet;

use App\Services\Pet\Service;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
