<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->char('product_id', 100);
            $table->char('product_category_id', 100);
            $table->char('product_type_id', 100);
            $table->char('vendor_id', 100);
            $table->string('asset_name');
            $table->char('serial_no', 200);
            $table->string('depreciation_type');
            $table->string('purchase_type');
            $table->string('purchase_date')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->string('warranty_expiry_date')->nullable();
            $table->string('description')->nullable();
            $table->string('useful_life')->nullable();
            $table->string('residual_value')->nullable();
            $table->string('residual_rate')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=Unassigned,1=Assigned');
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
        Schema::dropIfExists('assets');
    }
}
