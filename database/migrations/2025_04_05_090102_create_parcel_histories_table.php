<?php

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
        Schema::create('parcel_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcel_id')->constrained()->onDelete('cascade');
            $table->enum(
                'request_status',
                [
                    'shipped',
                    'delivered',
                    'cancelled'
                ]
            );
            $table->foreignId('created_by_user')->constrained('users')->onDelete('cascade');
            // $table->string('created_by_type')->nullable(); // العمود من اجل من قام يالتعديل ك موظف او مدير او مستخدم
            $table->enum('operation_type', [
                "insert",
                "update",
                "delete"
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcel_histories');
    }
};
