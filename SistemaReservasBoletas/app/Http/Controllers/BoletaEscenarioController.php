<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\User;
use App\models\Boletaescenario;

class BoletaEscenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $boletasEscenario = Boletaescenario::All();

        return json_encode($boletasEscenario);
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
        $request->validate([
            'user_id'=>'required',
            'numero_boleto'=>'required'
        ]);

        $numberTicket=array();
        $idUser = $request->get('user_id');

        $numberTicket[] = $request->get('numero_boleto');
        
        for($i=0;$i<count($numberTicket[0]);$i++){
     
            Boletaescenario::create([
                'user_id'=>$idUser,
                'numero_boleto'=>$numberTicket[0][$i]
            ]);
         
    }
        return json_encode("Reserva creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
