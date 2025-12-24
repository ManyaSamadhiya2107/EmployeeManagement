<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth')->nullable();
            $table->string('profile_picture')->nullable();
            $table->json('qualifications')->nullable();
            $table->json('experience')->nullable();
            $table->string('permanent_address_line1')->nullable();
            $table->string('permanent_address_line2')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_state')->nullable();
            $table->string('current_address_line1')->nullable();
            $table->string('current_address_line2')->nullable();
            $table->string('current_city')->nullable();
            $table->string('current_state')->nullable();
            $table->integer('age')->nullable();
            $table->string('role')->default('user');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('users');
    }
};
