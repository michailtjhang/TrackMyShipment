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
            CREATE TRIGGER `potong_saldo` AFTER INSERT ON `pembayaran` FOR EACH ROW
            BEGIN
                UPDATE dompet
                JOIN users ON dompet.id = users.dompet_id
                SET dompet.saldo = dompet.saldo - NEW.harga_total
                WHERE users.id = NEW.users_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `potong_saldo`');
    }
};
