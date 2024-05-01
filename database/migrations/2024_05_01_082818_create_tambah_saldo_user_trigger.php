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
            CREATE TRIGGER `tambah_saldo_user` BEFORE INSERT ON `users` FOR EACH ROW
            BEGIN
                IF NEW.id IS NOT NULL THEN
                    INSERT INTO dompet (saldo, bonus) VALUES ("10000", "1");

                    SET @dompet_id = LAST_INSERT_ID();

                    SET NEW.dompet_id = @dompet_id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tambah_saldo_user`');
    }
};
