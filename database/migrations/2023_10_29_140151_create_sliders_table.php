<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            
            $table->id();
            $table->string('title')->nullable();
            $table->tinyInteger('show_title')->unsigned()->default(1);
            $table->string('subtitle')->nullable();
            $table->text('details')->nullable();
            $table->string('link')->nullable();
            $table->string('type')->default('image');
            $table->string('image')->nullable();
            $table->string('poster')->nullable();
            $table->string('mp4video')->nullable();
            $table->string('webmvideo')->nullable();
            $table->string('ogvvideo')->nullable();
            $table->integer('serial');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
