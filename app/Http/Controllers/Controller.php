<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Retorna uma resposta em JSON
     *
     * @param string $detail
     * @param integer $code
     * @param string|null $error
     * @return void
     */
    public function responseJson( string $detail,  $code = 200, string $error = null,)
    {
        return response()->json([
            'code'=> $code,
            'detail' => $detail,
            'error' => $error
        ],(int)$code);
    }

}
