<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use App\Models\CampaignTracking;

class ProcessConvData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $campaign_id;
    protected $country_code;
    protected $creative_id;
    protected $browser_id;
    protected $device_id;
    protected $conv;
    protected $date;
    /**
     * Create a new job instance.
     *
     * @param intiger $campaign_id
     * @param string $country_code
     * @param intiger $creative_id
     * @param intiger $browser_id
     * @param intiger $device_id;
     * @param string $date;
     * @return void
     */
    public function __construct($campaign_id, $country_code, $creative_id, $browser_id, $device_id, $conv)
    {
        $this->campaign_id = $campaign_id;
        $this->country_code = $country_code;
        $this->creative_id = $creative_id;
        $this->browser_id = $browser_id;
        $this->device_id = $device_id;
        $this->conv = $conv;
        $this->date = date('Y-m-d');
       
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //(int)(microtime(true) * 10000)
        $item = CampaignTracking::firstOrNew(array(
            'campaign_id' =>  $this->campaign_id,
            'country_code'=> $this->country_code,
            'creative_id'=> $this->creative_id,
            'browser_id'=> $this->browser_id,
            'device_id'=> $this->device_id,
            'conv'=> $this->conv,
            'date'=> $this->date,
            )
        );
$item->count += 1;
$item->save();
    }
}
