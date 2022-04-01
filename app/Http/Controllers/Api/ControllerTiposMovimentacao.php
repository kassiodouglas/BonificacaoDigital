<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModelTiposMovimentacao;
use Illuminate\Http\Request;

class ControllerTiposMovimentacao extends Controller
{
    public function index()
    {
        return ModelTiposMovimentacao::get();
    }

    public function insert(Request $request)
    {
        $data = array_merge(
            $request->all(),
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return ModelTiposMovimentacao::insert($data);
    }

    public function show(int $id)
    {
        return ModelTiposMovimentacao::where('id',$id)->first();
    }
}
