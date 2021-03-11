<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade ');
            $table->string('name');
            $table->string('author');
            $table->string('published_by');
            $table->string('publish_year');
            $table->integer('number_pages');
            $table->integer('number_copies');
            $table->text('description')->nullable();
            $table->string('type_delivery');
            $table->date('delivery_date');
            $table->text('cover');
            $table->text('file')->nullable();
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
        Schema::dropIfExists('books');
    }
}
