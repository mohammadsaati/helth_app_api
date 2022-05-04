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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique()->index();
            $table->string("image");
            $table->unsignedBigInteger("category_id");
            $table->integer("priority")->nullable();
            $table->text("description");
            $table->integer("status")->default(1)->comment("1 active | 0 deActive");
            $table->timestamps();

            $table->foreign("category_id")->on("categories")->references("id")
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
        Schema::dropIfExists('posts');
    }
};
