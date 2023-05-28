<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Stevebauman\Location\Facades\Location;
use App\Jobs\ProcessConvData;
//use App\Location\Drivers\IPDriver;
use Illuminate\Support\Facades\Redis;

class CampaignTracker extends Controller
{
    public function index(Request $request)
    {

        
        $country_code = $this->getCountryCode($request->clientIp);
        $validated = $request->validate([
            'campaignId' => 'required|numeric',
            'clientIp' => 'required|string|max:15',
            'creativeId' => 'required|numeric',
            'browserId' => 'required|numeric',
            'deviceId' => 'required|numeric',
            'conv' => 'required|string|max:255',
        ]);
        ProcessConvData::dispatch($request->campaignId, $country_code, $request->creativeId, $request->browserId, $request->deviceId, $request->conv);
        return response('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAA1JREFUGFdj+L+U4T8ABu8CpCYJ1DQAAAAASUVORK5CYII=')->header('Content-Type', 'image/png');
    }

    private function getCountryCode($ip)
    {
        if($cachedIp = Redis::get('Track:Ip:' . $ip)){
            return $cachedIp;
        }else{
            $position = Location::get($ip);
            Redis::set('Track:IP:' . $ip, $position->countryCode);
            return $position->countryCode;
        }
       
    }
    
}
