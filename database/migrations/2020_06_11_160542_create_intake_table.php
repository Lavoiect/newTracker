<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntakeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intakes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('projectName')->unique()->index();
            $table->string('submittedBy')->nullable();
            $table->string('contactEmail')->nullable();
            $table->string('sme')->nullable();
            $table->string('stakeholder')->nullable();
            $table->string('requestType');
            $table->text('projectScope')->nullable();
            $table->date('dueDate')->nullable();
            $table->string('performMetric')->nullable();
            $table->string('updateName')->nullable();
            $table->string('whyUpdate')->nullable();
            $table->string('fcid')->nullable();
            $table->text('regions')->nullable();
            $table->integer('isNew')->default(0);
            $table->string('attach')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intakes');
    }
}
