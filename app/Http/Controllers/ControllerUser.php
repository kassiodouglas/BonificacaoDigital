<?php

namespace App\Http\Controllers;

use PDOException;
use App\Models\User;
use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ControllerUser extends Controller
{
    private $paginate = 10; #quantidade de registros por página

    /**
     * Exibe a view principal dos funcionarios
     *
     * @return view
     */
    public function index()
    {
        $users = User::with('perfil','admin');

        $urlParams['funcionario'] = '';
        $urlParams['data_inicial'] = date('Y-m-d');
        $urlParams['data_final'] = date('Y-m-d');


        #filtros
        if( isset($_GET['funcionario']) ){
            if( $_GET['funcionario'] !== '') {
                $users->where('id',$_GET['funcionario']);
                $urlParams['funcionario'] = $_GET['funcionario'];
            }
        }

        if( isset($_GET['data_inicial']) && isset($_GET['data_final'])  ){
            if( $_GET['data_inicial'] !== '' && $_GET['data_final'] !== ''){
                $urlParams['data_inicial'] = $_GET['data_inicial'];
                $urlParams['data_final'] = $_GET['data_final'];
                $users->whereRaw("left(created_at,10) BETWEEN '{$_GET['data_inicial']}' AND '{$_GET['data_final']}'");
            }
        }

        if(!Auth::user()->is_admin)
         $users = $users->where('id', Auth::user()->id);

        $users = $users->orderBy('created_at', 'desc')->paginate($this->paginate)->withQueryString();
        foreach($users as $index=>$user)
            $users[$index]['movimentacoes'] = $user->movimentacoes;

        #list all users
        $allusers = new User;
        if(!Auth::user()->is_admin)
            $allusers = $allusers->where('id', Auth::user()->id);

        $allusers = $allusers->orderBy('name')->get();

        return view('pages.users.index', [
            'users'=>$users,
            'allusers'=>$allusers,
            'urlParams' => $urlParams
        ]);

    }





    /**
     * Retorna uma lista com todos os usuários
     *
     * @return json|array
     */
    public function showAll()
    {
        $users = User::with('perfil','admin')->whereNull('delete_at')->get();

        foreach($users as $index=>$user)
            	$users[$index]['movimentacoes'] = $user->movimentacoes;

        if( count($users) == 0)
            return $this->responseJson('nenhum usuário encontrado');

        return $users;
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
            $user = User::with('perfil','admin')->whereNull('delete_at')->find($id);
            if( $user !== null)
                $user['Movimentacoes'] = $user->Movimentacoes;
        }catch(PDOException $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), $e->getMessage(), 500);
        }

        if( $user == null)
            return $this->responseJson("nenhum usuário encontrado para '$id'");

        return $user;
    }



    /**
     * Insere um novo usuário no banco
     *
     * @param Request $request
     * @return json
     */
    public function insert(Request $request)
    {
        $data = array_merge(
            $request->all(),
            [
                'password' => Hash::make('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
        ]);

        try{
            $result = User::create($data);
            $token = $result->createToken('token')->plainTextToken;

        }catch(PDOException  $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), 500, $e->getMessage(),);
        }

        if(is_string($result))
            return $this->responseJson("erro interno", 500, $result);
        else
            return $this->responseJson("cadastro realizado com sucesso ", 201);

    }


    /**
     * Atualiza um registro
     *
     * @param Request $request
     * @param integer $id
     * @return json
     */
    public function update(Request $request, int $id)
    {
        $data = $request->all();
        unset($data['_token']);

        try{
            $result = User::where('id',$id)->update($data);
        }catch(PDOException  $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), 500, $e->getMessage());
        }

        if(is_string($result))
            return $this->responseJson("erro interno", 500, $result);
        else
            return $this->responseJson("atualização realizada com sucesso", 200);
    }




    /**
     * Marca como deletado o usuario e suas movomentacoes
     *
     * @param Request $request
     * @param integer $id
     * @return json
     */
    public function destroy(int $id)
    {
        try{
            $result = User::where('id',$id)->delete();
            $resultmov = Movement::where('id_user',$id)->delete();
        }catch(PDOException  $e){
            return $this->responseJson( 'erro no banco de dados: ' . $e->getCode(), 500, $e->getMessage());
        }

        if(is_string($result))
            return $this->responseJson("erro interno", 500, $result);
        else
            return $this->responseJson("funcionário excluido com sucesso", 200);
    }



}
