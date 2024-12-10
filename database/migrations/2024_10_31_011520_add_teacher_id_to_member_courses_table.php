<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('member_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('member_courses', function (Blueprint $table) {
            $table->dropColumn('teacher_id');
        });
    }
};
