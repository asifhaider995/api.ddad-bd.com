<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignPlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_plays', function (Blueprint $table) {
            $table->id();
            $table->enum('campaign_type', ['campaign', 'default'])->nullable();
            $table->enum('content_type', ['primary', 'secondary', 'default'])->nullable();
            $table->string('android_imei', 20)->nullable();
            $table->unsignedInteger('campaign_id')->nullable();
            $table->unsignedInteger('shop_id')->nullable();
            $table->string('started_at')->nullable();
            $table->string('ended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_plays');
    }
}
