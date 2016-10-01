<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Device;
use App\Ubication;

class UbicationsController extends Controller
{
	//50:b7:c3:d8:55:b3
    //http://localhost:8000/ub/16.737389/-93.085204/1/1234
    //http://localhost:8000/ub/16.735496/-93.083622/1/50:b7:c3:d8:55:b2

    public function newUb($lat, $lon, $isAlert, $mac)
    {
        $currentHour = date('H:i:s',time());
        $currentDate = date('Y-m-d',time());
        //dd($mytime);*/
    	$targetDevice = Device::where('device',$mac)->first();
    	if ($targetDevice) {
    		$ubication = new Ubication;
    		$ubication->longitude = $lon;
    		$ubication->latitude = $lat;
    		$ubication->isAlert = $isAlert;
    		$ubication->device_id = $targetDevice->id;
            $ubication->date = $currentDate;
            $ubication->hour = $currentHour;

    		$ubication->save();
            return  "done";
    		# code...
    		//dd($car->id);
    	}else{
    		return "error";
    	}
    	
    }
}
