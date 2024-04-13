<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('work_name');
            $table->string('work_name_english');
            $table->text('work_task')->nullable();
            $table->string('study_type')->nullable();
            $table->foreignIdFor(User::class, 'professor_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'student_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};