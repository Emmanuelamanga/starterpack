<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('catid');
            $table->string('classid');
            $table->string('sub_title');
            $table->string('sub_desc');
            $table->string('sub_authorid');
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
        Schema::dropIfExists('package_subcategories');
    }
}
