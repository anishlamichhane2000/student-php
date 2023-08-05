<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id(); // Correct usage of the id() method
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->integer('age');
            $table->string('gender');
            $table->boolean('different_address')->default(false);
            $table->string('child_address')->nullable();
            $table->string('child_city')->nullable();
            $table->string('child_state')->nullable();
            $table->string('country')->nullable();
            $table->string('child_zip_code')->nullable();
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
        Schema::dropIfExists('children');
    }
}
