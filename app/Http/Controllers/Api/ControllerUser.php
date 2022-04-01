<?php

namespace App\Http\Controllers\Api;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class ControllerUser extends Controller
{


    public function index()
    {
        return ModelUser::get();
    }

    public function insert(Request $request)
    {
        $data = array_merge(
            $request->all(),
            [
                'avatar'   => Crypt::encryptString($request->avatar . date('Y-m-d H:i:s')) . ".jpg",
                'password' => Crypt::encryptString($request->password),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return ModelUser::insert($data);
    }

    public function update(Request $request, int $id)
    {
        $data = array_merge(
            $request->all(),
            [
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return ModelUser::where('id',$id)->update($data);
    }

    public function show(int $id)
    {
        return ModelUser::where('id',$id)->first();
    }

}
