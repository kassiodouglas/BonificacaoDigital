<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use App\Models\Movement;
use Illuminate\Http\Request;
use App\Models\TypesMovement;
use Illuminate\Support\Facades\Auth;


class ControllerMovement extends Controller
{

    private $paginate = 10; #quantidade de registros por página

    /**
     * Exibe a view principal das movimentações
     *
     * @return view
     */
    public function index()
    {
        $movements = Movement::with('type_movement','admin','user');

        $urlParams['funcionario'] = '';
        $urlParams['tipo'] = '';
        $urlParams['data_inicial'] = date('Y-m-d');
        $urlParams['data_final'] = date('Y-m-d');


        #filtros
        if( isset($_GET['funcionario']) ){
            if( $_GET['funcionario'] !== '') {
                $movements->where('id_user',$_GET['funcionario']);
                $urlParams['funcionario'] = $_GET['funcionario'];
            }
        }

        if( isset($_GET['tipo'])){
            if( $_GET['tipo'] !== '' && $_GET['tipo'] !== '0'){
                $movements->where('id_tipo', $_GET['tipo']);
                $urlParams['tipo'] = $_GET['tipo'];
            }
        }

        if( isset($_GET['data_inicial']) && isset($_GET['data_final'])  ){
            if( $_GET['data_inicial'] !== '' && $_GET['data_final'] !== ''){
                $urlParams['data_inicial'] = $_GET['data_inicial'];
                $urlParams['data_final'] = $_GET['data_final'];
                $movements->whereRaw("left(created_at,10) BETWEEN '{$_GET['data_inicial']}' AND '{$_GET['data_final']}'");
            }
        }

        if(!Auth::user()->is_admin)
            $movements = $movements->where('id_user', Auth::user()->id);

        $movements = $movements->orderBy('created_at', 'desc')->paginate($this->paginate)->withQueryString();

        #tipos mov
        $types = TypesMovement::all();

        #list usuarios
        $users = User::orderBy('name');

        if(!Auth::user()->is_admin)
            $users = $users->where('id', Auth::user()->id);
        $users = $users->get();

        return view('pages.movements.index', [
            'movements'=>$movements,
            'users'=>$users,
            'types'=>$types,

            'urlParams' => $urlParams
        ]);
    }






    /**
     * Retorna uma lista com todas as movimentações
     *
     * @return json|array
     */
    public function showAll()
    {
        $movements = Movement::with('tipo_movimentacao','user','admin')->get();

        if( count($movements) == 0)
            return $this->responseJson('nenhuma movimentação encontrada');

        return $movements;
    }


    /**
     * Insere uma nova movimentação no banco
     *
     * @param Request $request
     * @return json
     */
    public function insert(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        try{
            $result = Movement::insert($data);
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
            $movement = Movement::with('tipo_movimentacao','user','admin')->where('id',$id)->first();
        }catch(PDOException $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), 500, $e->getMessage());
        }

        if( $movement == null)
            return $this->responseJson("nenhuma movimentação encontrada para '$id'");

        return $movement;
    }


}
