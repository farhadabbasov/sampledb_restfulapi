<?php

namespace App\Http\Controllers;

use App\Utility\Responser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected Responser $responser;
    public function __construct(Responser $responser)
    {
        $this->responser = $responser;
    }
}
