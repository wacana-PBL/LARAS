<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('konsultasis', function (Blueprint $table) {
            $table->string('status_logbook', 20)->default('submitted')->after('status_approval');
            $table->text('catatan_review')->nullable()->after('catatan_progress');
            $table->string('file_draft')->nullable()->after('catatan_review');
            $table->string('status_presensi', 20)->default('pending')->after('file_draft');
        });
    }

    public function down(): void
    {
        Schema::table('konsultasis', function (Blueprint $table) {
            $table->dropColumn(['status_logbook', 'catatan_review', 'file_draft', 'status_presensi']);
        });
    }
};
