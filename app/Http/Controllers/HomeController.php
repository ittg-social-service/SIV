<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use Cloudder;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $user_devices = User::find($user->id)->drivers()->join('devices', 'drivers.id', '=', 'devices.driver_id')
                ->get();

     /*   $user_devices = DB::table('devices')
               
                ->join('users', function ($join){
                    $user = Auth::user();
                    $join->on('devices.user_id', '=', 'users.id')
                        ->where('users.id', '=', $user->id);
                })
                ->join('drivers', 'devices.driver_id', '=', 'drivers.id')
                ->get();*/
             /*   dd($user_devices);*/
        return view('client.home', ['user_devices' => $user_devices]);


    }
    public function settings()
    {
        $user = Auth::user();
        return view('client.settings', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $avatar = "";
         if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $fileName = Auth::user()->id . '.' . $avatar->getClientOriginalExtension();
           /* Cloudder::upload($avatar, $fileName);
            $uplo = Cloudder::getResult();*/
           /* dd($uplo['url']);*/
            Image::make($avatar)->save( public_path('uploads/avatars/' . $fileName) ); 
            $avatar = '/uploads/avatars/' . $fileName;
        }else{
            $avatar = $user->avatar;
        }
        $user->name = $request->name;
        $user->avatar = $avatar;
        $user->save();
        
        return redirect('/client/home');
    
    }

    public function stats()
    {
        $user = Auth::user();
        $device_alert =  User::find($user->id)->devices()
                                              ->join('ubications', function ($join) {
                                                    $currentDate = date('Y-m-d',time());
                                                    $join->on('devices.id', '=', 'ubications.device_id')
                                                         ->where('ubications.date', '=', $currentDate);
                                                        /* ->where('ubications.isAlert', '=', 1);*/
                                                })
                                              ->join('drivers', function ($join) {
      
                                                    $join->on('devices.driver_id', '=', 'drivers.id');
                                                        /* ->where('ubications.isAlert', '=', 1);*/
                                                })

                                            ->get();
        return view('client.stats', ['device_alert' => $device_alert]);
    }
}
