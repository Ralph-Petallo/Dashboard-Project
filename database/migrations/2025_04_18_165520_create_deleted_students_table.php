<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('deleted_students', function (Blueprint $table) {
            $table->id();                                // Auto-incrementing ID
            $table->string('first_name');                // First name of the student
            $table->string('last_name');                 // Last name of the student
            $table->string('password');                  // Password of the student
            $table->string('email')->unique();           // Email of the student
            $table->string('number');                    // Contact number of the student
            $table->timestamp('deleted_at')->nullable(); // Timestamp for when the student was deleted
            $table->timestamps();                        // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('deleted_students');
    }
}
