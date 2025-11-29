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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('listing_type')->nullable()->comment('Buying | Selling | Swap');
            $table->string('title');
            $table->json('description');
            $table->string('price_type')->comment('FIXED, RANGE')->default('FIXED');
            $table->double('start_price', 15, 2)->nullable();
            $table->double('min_price')->nullable();
            $table->double('max_price')->nullable();
            $table->string('reference_url')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('reported_at')->nullable();
            $table->string('report_reason')->nullable();
            $table->string('report_remarks')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->string('close_reason')->nullable();
            $table->integer('views_count')->nullable();
            $table->integer('likes_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
