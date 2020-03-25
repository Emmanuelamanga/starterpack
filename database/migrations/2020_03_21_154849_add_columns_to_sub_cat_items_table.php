<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSubCatItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_cat_items', function (Blueprint $table) {
            $table->string('catid');
            $table->string('grpid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_cat_items', function (Blueprint $table) {
            $table->dropColumn('catid');
            $table->dropColumn('grpid');
        });
    }
}
