<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->string('user_country')->nullable();
            $table->string('user_phone_number')->nullable();
			//$table->unsignedInteger('user_id')->nullable();

			/*$table->foreign('user_id')
				  ->references('id')
			      ->on('users')
			      ->onUpdate('cascade')
			      ->onDelete('some action');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
