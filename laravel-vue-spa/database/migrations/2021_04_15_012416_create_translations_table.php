<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assignee_id')->nullable()->comment('assignee_id = NULL:only Manager and Master read');
            $table->foreign('assignee_id')->references('id')->on('users');
            $table->BigInteger('created_by');
            $table->BigInteger('updated_by');
            $table->string('title');
            $table->longText('content_default');
            $table->longText('content_translated');
            $table->tinyInteger('status')->comment('1-Open; 2-Inprogress; 3-Done')->default(1);
            $table->tinyInteger('type')->comment('1-Normal; 2-Avarage; 3-Secret ')->default(1);
            $table->date('start_date');
            $table->date('end_date')->comment('Deadline');
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
        Schema::dropIfExists('translations');
    }
}
