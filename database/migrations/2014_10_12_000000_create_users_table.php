<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string("api_key")->unique()->index();
            $table->string("phone_number")->unique()->index();
            $table->string('password');
            $table->enum("status" , [0 , 1])->default(1)->comment("1 active | 0 deActive");
            $table->unsignedBigInteger("city_id")->nullable();
            $table->unsignedBigInteger("user_type_id");
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("user_type_id")->on("user_types")->references("id")
                ->onDelete("restrict")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
