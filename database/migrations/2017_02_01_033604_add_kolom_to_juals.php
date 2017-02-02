<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKolomToJuals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('juals', function(Blueprint $table)
        {
            $table->integer('hargaNormal')->after('title');
            $table->integer('diskon')->after('hargaNormal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juals', function(Blueprint $table)
        {
            $table->dropColumn('hargaNormal');
            $table->dropColumn('diskon');
        });
    }
}
