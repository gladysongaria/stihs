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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_image')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_description')->nullable();
            $table->string('item_specification')->nullable();
            $table->string('old_property_number')->nullable();
            $table->string('new_property_number')->nullable();
            $table->string('unit_measure')->nullable();
            $table->foreignId('source_id')->constrained('sources')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->date('date_acquired')->nullable();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            // Drop the item_image field if you ever need to rollback
            $table->dropColumn('item_image');
        });
    }
};





