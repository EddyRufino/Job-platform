<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->string('slug');
            $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories');
            $table->foreignId('experience_id')
                    ->nullable()
                    ->constrained('experiences');
            $table->foreignId('location_id')
                    ->nullable()
                    ->constrained('locations');
            $table->foreignId('salary_id')
                    ->nullable()
                    ->constrained('salaries');
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
        Schema::dropIfExists('vacancies');
    }
}
