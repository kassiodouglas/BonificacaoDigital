<?php

namespace App\Http\Controllers\Api;

use PDOException;
use Illuminate\Http\Request;
use App\Models\TypesMovement;
use App\Http\Controllers\Controller;

class ControllerTypesMovement extends Controller
{
    /**
     * Retorna uma lista com todos os tipo de movimentações
     *
     * @return json|array
     */
    public function showAll()
    {
        $TypesMovement = TypesMovement::get();

        if( count($TypesMovement) == 0)
            return $this->responseJson('nenhum tipo de movimentação encontrada');

        return $TypesMovement;
    }

    /**
     * Insere um novo tipo de movimentação no banco
     *
     * @param Request $request
     * @return json
     */
    public function insert(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        try{
            $result = TypesMovement::insert($data);
        }catch(PDOException  $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), 500, $e->getMessage());
        }

        if(is_string($result))
            return $this->responseJson("erro interno", 500, $result);
        else
            return $this->responseJson("cadastro realizado com sucesso", 201);
    }

    /**
     * Retorna um unico registro
     *
     * @param integer $id
     * @return json|array
     */
    public function show(int $id)
    {
        try{
            $TypesMovement = TypesMovement::where('id',$id)->first();
        }catch(PDOException $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), 500, $e->getMessage());
        }

        if($TypesMovement == null)
            return $this->responseJson("nenhum tipo de movimentação encontrado para '$id'");

        return $TypesMovement;
    }
}
