<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Driver;
use Auth;
use Image;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $user_drivers = User::find($user->id)->drivers;
        return view('client.drivers.drivers', ['user_drivers' => $user_drivers]);
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
        //
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
        $target = Driver::find($id);
        return view('client.drivers.edit')->with('target', $target);
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
        $driver = Driver::find($id);
        $avatar = "";

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = Auth::user()->id . '_'. $id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250, 150)->save( public_path('uploads/avatars/drivers/' . $fileName) ); 
            $avatar = '/uploads/avatars/drivers/' . $fileName;
        }else{
            $avatar = $driver->avatar;
        }

        
        $driver->name = $request->name;
        $driver->avatar = $avatar;
        $driver->save();
        return redirect('/client/drivers/');
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
