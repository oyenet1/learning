<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuretiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sureties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('security_id')->nullable()->constrained();
            $table->string('title');
            $table->string('phone');
            $table->string('image');
            $table->text('address');
            $table->string('relationship');
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
        Schema::dropIfExists('sureties');
    }
}
