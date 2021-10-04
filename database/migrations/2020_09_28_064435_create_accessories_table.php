<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->char('company_id', 255);
            $table->char('vendor_id', 255);
            $table->string('accessory_category');
            $table->string('accessory_name');
            $table->char('model_no', 255);
            $table->char('order_no', 255)->nullable();
            $table->char('purchase_qty',50)->nullable();
            $table->text('purchase_unit_price')->nullable();
            $table->text('purchase_total_price')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('warranty_expiry_date')->nullable();
            $table->text('manufacturer')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('accessories');
    }
}
