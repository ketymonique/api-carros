<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cliente;
use Exception;

class ClientesController extends Controller
{
    public function status(){
        return['status' => 'ok'];
    }

    public function cliente(Request $request){
        try{
            $cliente = new Cliente();

            $cliente->nome = $request->nome;
            $cliente->telefone = $request->telefone;
            $cliente->cpf = $request->cpf;
            $cliente->placa = $request->placa;
            $cliente->marca = $request->marca;
            $cliente->cor = $request->cor;

            $cliente->save();
            
            return['returno'=>'ok'];
        } catch(Exception $error){
            return['returno'=>'erro', 'details'=>$erro];
        }
    }

    public function select($id){
        $cliente = Cliente::find($id);

        return $cliente;
    }

    public function finalPlaca($numero){
        $cliente = Cliente::where('placa', 'LIKE', '%'.$numero)
                                    ->find();
    }

    public function update(Request $request, $id){
        try{
            $cliente = Contato::find($id);

            $cliente->nome = $request->nome;
            $cliente->telefone = $request->telefone;
            $cliente->cpf = $request->cpf;
            $cliente->placa = $request->placa;
            $cliente->marca = $request->marca;
            $cliente->cor = $request->cor;

            $cliente->save();
            
            return['returno'=>'ok'];
        } catch(Exception $error){
            return['returno'=>'erro', 'details'=>$erro];
        }
    }

    public function delete($id){
        try{
            $cliente = Cliente::find($id);

            $cliente->delete();
            
            return['returno'=>'ok'];
        } catch(\Exception $erro){
            return['returno'=>'erro', 'details'=>$erro];
        }
    }

}
