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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->default('null')->constrained('users')->onDelete('cascade');
            $table->string('receiver_name')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('receiver_phone_number');
            $table->string('tracking_number');
            $table->float('cost');
            $table->float('weight');
            $table->enum('status', ['shipped', 'delivered', 'cancelled'])->default('null');
            $table->softDeletes(); // من اجل اذا تم حذف السجل الخاص ب الطرد عندها سيتم حذف السجل منطقيا اي وضعة في سلة مهملات لكن فيزيائيا لن يتم حذفة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};
