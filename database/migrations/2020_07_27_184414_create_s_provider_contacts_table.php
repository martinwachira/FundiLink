<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSProviderContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_provider_contacts', function (Blueprint $table) {
            $table->id();
            
            // foreign key on employee's table
            $table->integer('providerId')->unsigned();
            $table->foreign('providerId')->references('id')->on('service_providers');

            $table->integer('phone');
            $table->string('address');
            $table->string('location');
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
        Schema::dropIfExists('s_provider_contacts');
    }
}
