<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaign_tracking', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->string('country_code');
            $table->integer('creative_id');
            $table->integer('browser_id');
            $table->integer('device_id');
            $table->bigInteger('count');
            $table->date('date')->format('Y-m-d');
            $table->string('conv');
            $table->timestamps();

            //$table->primary(['campaign_id', 'country_code','date','device_id','browser_id','creative_id','conv']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_tracking');
    }
};
