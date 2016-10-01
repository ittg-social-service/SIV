<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Device;

Use App\User;

use App\Driver;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $clients = User::whereNotIn('role', ['admin'])->get();//clientes que no son administradores
        $available_devices = Device::where('user_id','1')->get();
        return view('admin.sales', ['clients' => $clients, 'available_devices' => $available_devices]);
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
        //creamos un driver por defecto para el dispositivo
        $driver = new Driver;
        $driver->name = str_random(10);
        $driver->user_id = $request->client;
        $driver->save();

        $device = Device::find($request->device);//obtenemos datos del dispositivo seleccionado
        $device->user_id = $request->client; //modificamos el dueño del dispositivo por el cliente eleccionado
        $device->driver_id = $driver->id;
        //dd($device);
        $device->save();
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
