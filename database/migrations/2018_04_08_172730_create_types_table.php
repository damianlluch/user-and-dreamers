
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('avatar')->nullable();
            $table->date('birthDate')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('types');
    }
}
