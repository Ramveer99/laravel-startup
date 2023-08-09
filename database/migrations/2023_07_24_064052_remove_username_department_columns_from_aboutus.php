<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUsernameDepartmentColumnsFromAboutus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aboutus', function (Blueprint $table) {
            //
             // Remove the 'username' column
             if (Schema::hasColumn('aboutus', 'username')) {
                $table->dropColumn('username');
            }

            // Remove the 'department' column
            if (Schema::hasColumn('aboutus', 'department')) {
                $table->dropColumn('department');
            }


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aboutus', function (Blueprint $table) {
            //

            $table->string('username')->nullable();
            $table->string('department')->nullable();
        });
    }
}
