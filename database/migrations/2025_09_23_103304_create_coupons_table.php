<?php

declare(strict_types=1);

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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->smallInteger('type')->default(0); // , [0 => 'amount' , 1 => 'percentage']
            $table->decimal('amount', 19, 0)->nullable();
            $table->unsignedInteger('percentage')->nullable();
            $table->unsignedInteger('max_percentage_amount')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->longText('desc')->nullable();

            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
