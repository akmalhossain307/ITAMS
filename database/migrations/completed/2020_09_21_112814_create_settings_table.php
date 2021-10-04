<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->char('app_name', 255)->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_logo')->nullable();
            $table->text('favicon')->nullable();
            $table->char('company_email', 255)->nullable();
            $table->char('contact_no', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('footer_text')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
