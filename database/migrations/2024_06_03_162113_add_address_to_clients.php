<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToClientsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Drop the existing address column
            $table->dropColumn('address');

            // Add a new column for the foreign key
            $table->unsignedBigInteger('city_id')->nullable();

            // Add a foreign key constraint
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['city_id']);

            // Drop the city_id column
            $table->dropColumn('city_id');

            // Recreate the address column if needed
            $table->string('address', 100)->nullable();
        });
    }
}
