<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `update_saldo_dompet` AFTER INSERT ON `topup` FOR EACH ROW
            BEGIN
                INSERT INTO dompet 
                SET id = NEW.dompet_id, saldo = NEW.saldo, bonus = NEW.bonus
                ON DUPLICATE KEY UPDATE saldo = saldo + NEW.saldo, bonus = bonus + NEW.bonus;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `update_saldo_dompet`');
    }
};
