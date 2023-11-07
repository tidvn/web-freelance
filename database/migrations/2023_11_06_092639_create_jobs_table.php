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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->collation('utf8mb4_unicode_ci');
            $table->string('slug', 255)->collation('utf8mb4_unicode_ci');
            $table->text('description')->collation('utf8mb4_unicode_ci');
            $table->text('requirements')->collation('utf8mb4_unicode_ci');
            $table->datetime('deadline')->nullable();
            $table->json('eligibility')->nullable();
            $table->json('references')->nullable();
            $table->enum('status', ['OPEN', 'REVIEW', 'CLOSED'])->collation('utf8mb4_unicode_ci')->default('OPEN');
            $table->string('currency', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->integer('rewardAmount')->nullable();
            $table->json('rewards')->nullable();
            $table->integer('companyId')->unsigned();
            $table->enum('source', ['NATIVE', 'IMPORT'])->collation('utf8mb4_unicode_ci')->default('NATIVE');
            $table->json('sourceDetails')->nullable();
            $table->tinyInteger('isPublished')->default(0);
            $table->tinyInteger('isFeatured')->default(0);
            $table->tinyInteger('isActive')->default(1);
            $table->tinyInteger('isArchived')->default(0);
            $table->string('applicationLink', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->enum('applicationType', ['rolling', 'fixed'])->collation('utf8mb4_unicode_ci')->default('fixed');
            $table->json('skills')->nullable();
            $table->integer('totalWinnersSelected')->default(0);
            $table->integer('totalPaymentsMade')->default(0);
            $table->tinyInteger('isWinnersAnnounced')->default(0);
            $table->enum('type', ['permissioned', 'open'])->collation('utf8mb4_unicode_ci')->default('open');
            $table->string('pocSocials', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('timeToComplete', 255)->nullable()->collation('utf8mb4_unicode_ci');
            $table->tinyInteger('hackathonprize')->default(0);
            $table->json('winners')->nullable();

            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';

            //$table->foreign('companyId')->references('id')->on('companys');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};