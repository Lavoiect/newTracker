<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->index()->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('title');
            $table->text('body')->nullable();
            $table->text('scope')->nullable();
            $table->date('dueDate')->nullable();
            $table->string('submittedBy')->nullable();
            $table->string('stakeholder')->nullable();
            $table->string('requestType')->nullable();
            $table->string('performMetric')->nullable();
            $table->string('whatUpdate')->nullable();
            $table->text('describe')->nullable();
            $table->string('sme', 55)->nullable();
            $table->string('fcid', 55)->nullable();
            $table->date('intakeDate')->nullable();
            $table->integer('status')->default(1);
            $table->integer('isReview')->default(0);
            $table->integer('isComplete')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
