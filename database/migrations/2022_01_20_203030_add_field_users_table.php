<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class AddFieldUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('fechan')->nullable();
            $table->string('apellido')->nullable();
            $table->string('direccion')->nullable();
            $table->boolean('sexo')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('role')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['fechan','apellido','direccion','sexo','phone_number','role']);
        });
    }
}
