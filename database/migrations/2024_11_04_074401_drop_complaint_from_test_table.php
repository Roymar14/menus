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
        Schema::table('complaints_responses', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->foreign('admin_id')->on('users')->references('id')->onDelete('cascade');
            $table->integer('user_id');
            $table->text('response');
            $table->string('image')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaint_responses', function (Blueprint $table) {
            //
        });
    }
};
