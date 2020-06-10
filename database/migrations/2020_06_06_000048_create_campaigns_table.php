<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->dateTime('starting_date')->nullable();
            $table->dateTime('ending_date')->nullable();
            $table->string('primary_path')->nullable();
            $table->string('secondary_path')->nullable();
            $table->integer('primary_queue')->nullable();
            $table->integer('secondary_queue')->nullable();
            $table->boolean('auto_renew')->default(false);
            $table->unsignedInteger('renewed_from')->default(false);
            $table->unsignedInteger('client_id')->nullable();
            $table->string('package')->nullable();
            $table->unsignedInteger('reviewer_id')->nullable();
            $table->text('reviewer_note')->nullable();
            $table->dateTime('reviewed_at')->nullable();
            $table->string('status')->nullable();
            $table->decimal('actual_price', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('campaign_location', function (Blueprint $table) {
            $table->unsignedInteger('campaign_id');
            $table->unsignedInteger('location_id');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
