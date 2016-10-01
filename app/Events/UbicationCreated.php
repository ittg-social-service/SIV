<?php

namespace App\Events;

use DB;
use App\Ubication;
use App\Driver;
use App\Device;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class UbicationCreated extends Event implements ShouldBroadcast
{
    use SerializesModels;
    public $ubication;
    public $driver;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Ubication $ubication)
    {
       /* $device = DB::table('devices')
            ->where('device',$ubication->mac)->get();*/
        $this->ubication = $ubication;
        $device = Device::find($ubication->device_id);
        $this->driver = Driver::find($device->driver_id);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['ubicationAction'];
    }
}
