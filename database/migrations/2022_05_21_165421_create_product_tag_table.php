<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
            $table->foreignId('tag_id')->constrained();
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_tag');
    }
};
