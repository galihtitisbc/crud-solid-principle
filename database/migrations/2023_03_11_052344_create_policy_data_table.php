<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_data', function (Blueprint $table) {
            $table->id();
            $table->string('policy');
            $table->string('expiry');
            $table->string('location');
            $table->string('state');
            $table->string('region');
            $table->string('insured');
            $table->string('construction');
            $table->string('business');
            $table->string('earth');
            $table->string('flood');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_data');
    }
};
