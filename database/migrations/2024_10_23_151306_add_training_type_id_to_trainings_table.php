<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainingTypeIdToTrainingsTable extends Migration
{
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->foreignId('training_type_id')->constrained()->after('company_id');  // Menambahkan kolom training_type_id
        });
    }

    public function down()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropForeign(['training_type_id']);  // Menghapus foreign key jika ada
            $table->dropColumn('training_type_id');  // Menghapus kolom training_type_id
        });
    }
};
