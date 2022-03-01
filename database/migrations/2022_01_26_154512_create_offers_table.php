<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('offerid');
            $table->string('user_id');
            $table->string('offer_name');
            $table->string('advertiserId');
            $table->text('offer_category');
            $table->string('modelIn');
            $table->string('priceIn');
            $table->string('modelOut');
            $table->string('priceOut');
            $table->string('offer_currency');
            $table->text('offer_logo')->nullable;
            $table->text('offer_preview');
            $table->text('offer_url');
            $table->text('offer_terms');
            $table->text('offer_KPI');
            $table->string('payoutRules');
            $table->string('offer_start_date');
            $table->string('offer_end_date');
            $table->string('offer_access');
            $table->string('offer_status');
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
        Schema::dropIfExists('offers');
    }
}
