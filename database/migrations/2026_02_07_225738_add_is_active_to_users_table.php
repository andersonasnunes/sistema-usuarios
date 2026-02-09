<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1) adiciona a coluna boolean
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('status');
        });

        // 2) converte os dados existentes (enum -> boolean)
        DB::table('users')->where('status', 'ativo')->update(['is_active' => 1]);
        DB::table('users')->where('status', 'inativo')->update(['is_active' => 0]);

        // 3) remove a coluna antiga (enum)
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    public function down(): void
    {
        // 1) recria o enum
        Schema::table('users', function (Blueprint $table) {
            $table->enum('status', ['ativo', 'inativo'])->default('ativo')->after('email');
        });

        // 2) reconverte boolean -> enum
        DB::table('users')->where('is_active', 1)->update(['status' => 'ativo']);
        DB::table('users')->where('is_active', 0)->update(['status' => 'inativo']);

        // 3) remove o boolean
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
