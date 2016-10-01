<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Device;
use App\Ubication;
use App\Driver;
use DB;
use Auth;
use Image;

class DevicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        $selected_device = Device::find($id);
        $other_devices = $user->devices()->whereNotIn('id', [$id])->get();

        return view('client.maps.staticMap', [
            'id' => $id,
            'firstTime' => true,
            'error' => false,
            'selected_device' => $selected_device,
            'other_devices' => $other_devices 
            ]);    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target = Device::find($id);
        return view('client.devices.edit')->with('target', $target);
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
        $device = Device::find($id);
        $picture = "";

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $fileName = Auth::user()->id . '_'. $id . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(250, 150)->save( public_path('uploads/devices-pictures/' . $fileName) ); 
            $picture = '/uploads/devices-pictures/' . $fileName;
        }else{
            $picture = $device->picture;
        }

        
        $device->type = $request->type;
        $device->license_plate = $request->license_plate;
        $device->picture = $picture;
        $device->save();
        notify()->flash('Welcome back!', 'success', [
            'timer' => 3000,
            'text' => 'It\'s really great to see you again',
        ]);
        
        return redirect('/client/home');
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

    public function showMap(Request $request)
    {   


        $user = Auth::user();
        $selected_device = Device::find($request->device);
        $other_devices = $user->devices()->whereNotIn('id', [$request->device])->get();
        $driver = Driver::find($selected_device->driver_id);
        $error = false;
        $ubs = DB::table('ubications')->where([
            ['device_id', '=', $request->device],
            ['date', '=', $request->date],
            ['hour', '>=', $request->hour1],
            ['hour', '<=', $request->hour2]

        ])->get();
        if (count($ubs) == 0) {
            $error = true;
        }

        
        return  view('client.maps.staticMap', [
            'ubs' => $ubs,
            'error' => $error,
            'firstTime' => false,
            'selected_device' => $selected_device,
            'other_devices' => $other_devices,
            'driver' => $driver 
            ]);
         //return view('client.maps.staticMap')->with('id', $id); 
    }

     public function alarmMarker($lat, $lon)
    {
        $marker = new Marker();
          // Configure your marker options
        $marker->setPrefixJavascriptVariable('marker_');

        $marker->setAnimation(Animation::BOUNCE);

        $marker->setOptions(array(
            'clickable' => true,
            'flat'      => true,
        ));

        $marker->setPosition($lat, $lon, true);

        return $marker;
    }
}
