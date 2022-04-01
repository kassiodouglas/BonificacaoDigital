<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelMovimentacao;
use Illuminate\Support\Facades\Crypt;

class ControllerMovimentacao extends Controller
{

    public function index()
    {
        return ModelMovimentacao::get();
    }

    public function insert(Request $request)
    {
        $data = array_merge(
            $request->all(),
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return ModelMovimentacao::insert($data);
    }

    public function show(int $id)
    {
        return ModelMovimentacao::where('id',$id)->first();
    }

}
