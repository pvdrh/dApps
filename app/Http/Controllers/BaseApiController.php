<?php

namespace App\Http\Controllers;

use App\Traits\HandleResponseApi;
use App\Http\Controllers\Controller as BaseController;

class BaseApiController extends BaseController
{
    use HandleResponseApi;
}
