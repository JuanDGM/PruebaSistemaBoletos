<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\User;
use App\models\Boleta;
use App\models\Cantidadboleta;

class BoletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBoleta = Cantidadboleta::All();

        $BoletasAsignadas = Boleta::All();

        $cantidadBoletasDisponibles = $allBoleta[0]->cantidad_boletos-count($BoletasAsignadas); 

        return json_encode($cantidadBoletasDisponibles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $idUser = $request->get('idUser');
        $numberTicketsAssigned = $request->get('numberTicketsAssigned');

        $allBoleta = Cantidadboleta::All();

        $BoletasAsignadas = Boleta::All();

        $cantidadBoletasDisponibles = $allBoleta[0]->cantidad_boletos-count($BoletasAsignadas);

        if($numberTicketsAssigned<=$cantidadBoletasDisponibles){

            for($i=0;$i<$numberTicketsAssigned;$i++){
                Boleta::create([
                    'user_id'=>$idUser
                ]);
             }    
             return json_encode("Asignado correctamente");
        }else{
            return json_encode("No se permite asignar mas boletas de los disponibles, ingresa nuevamente");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $idUser = $id;

        $queryBoletasAsignadasUser = Boleta::select('boletas.id','users.name','users.celular','users.cedula','users.email')
                                    ->join('users','boletas.user_id','=','users.id')
                                    ->where('boletas.user_id','=',$id)
                                    ->get();

        return json_encode($queryBoletasAsignadasUser);                            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
