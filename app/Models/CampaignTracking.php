<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignTracking extends Model
{
    use HasFactory;
    protected $table = 'campaign_tracking';
    protected $fillable =  ['campaign_id', 'country_code','date','device_id','browser_id','creative_id','conv'];
    public $incrementing = false;
    
}
