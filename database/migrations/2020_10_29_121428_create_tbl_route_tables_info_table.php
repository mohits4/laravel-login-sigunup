<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRouteTablesInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_route_tables_info', function (Blueprint $table) {
            $table->id();
            $table->string('destination',255);
		    $table->string('gateway' ,255);
            $table->string('genmask' ,255);
            $table->string('flags' ,255);
            $table->string('metric' ,255);
            $table->string('ref' ,255);
            $table->string('t_use' ,255);
            $table->string('iface' ,255);
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
        Schema::dropIfExists('tbl_route_tables_info');
    }
}
