<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('owner_name')->nullable();
            $table->string('owner_nid')->nullable();
            $table->string('document_path')->nullable();
            $table->string('kcp_name')->nullable();
            $table->string('kcp_mobile_number')->nullable();
            $table->string('payment_per_ad')->nullable();
            $table->string('average_visit')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->date('payment_due_date')->nullable();
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->unsignedBigInteger('detector_id')->nullable();
            $table->unsignedBigInteger('tv_id')->nullable();
            $table->unsignedBigInteger('android_box_id')->nullable();
            $table->unsignedBigInteger('isp_id')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
