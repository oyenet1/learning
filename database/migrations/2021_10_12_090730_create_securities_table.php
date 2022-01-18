<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->foreignId('branch_id')->constrained();
            $table->date('dob');
            $table->string('role')->default('security')->nullable();
            $table->date('date_employed');
            $table->string('birth');
            $table->string('nationality')->default('nigeria');
            $table->string('sor');
            $table->string('lga');
            $table->text('address');
            $table->string('religion');
            $table->string('card_no')->unique();
            $table->string('id_card');
            $table->bigInteger('phone');
            $table->bigInteger('bvn')->unique();
            $table->string('email')->unique();
            $table->double('height', $precision = 4, $scale = 2)->nullable();
            $table->string('b_group');
            $table->double('salary', $precision = 8, $scale = 2)->nullable();
            $table->string('nok_name');
            $table->string('nok_phone');
            $table->text('nok_address');
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
        Schema::dropIfExists('securities');
    }
}
